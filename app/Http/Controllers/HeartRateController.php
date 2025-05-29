<?php

namespace App\Http\Controllers;

use App\Models\HeartRate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class HeartRateController extends Controller
{
    public function store(Request $request)
    {
        // Validate the incoming data
        $validator = Validator::make($request->all(), [
            'device_id' => 'required|string',
            'heart_rate' => 'required|integer|min:30|max:220',
            'timestamp' => 'required|date',
            'user_id' => 'required|exists:users,id'
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        // Store the heart rate data
        $heartRate = HeartRate::create([
            'device_id' => $request->device_id,
            'heart_rate' => $request->heart_rate,
            'timestamp' => $request->timestamp,
            'user_id' => $request->user_id
        ]);

        // Check for abnormal heart rate
        if ($heartRate->heart_rate > 100 || $heartRate->heart_rate < 60) {
            // Create an alert
            $heartRate->alerts()->create([
                'type' => $heartRate->heart_rate > 100 ? 'high' : 'low',
                'message' => 'Abnormal heart rate detected: ' . $heartRate->heart_rate . ' bpm',
                'status' => 'pending'
            ]);
        }

        return response()->json([
            'message' => 'Heart rate data recorded successfully',
            'data' => $heartRate
        ], 201);
    }

    public function getLatestHeartRate($userId)
    {
        $latestHeartRate = HeartRate::where('user_id', $userId)
            ->latest()
            ->first();

        return response()->json([
            'data' => $latestHeartRate
        ]);
    }

    public function getHeartRateHistory($userId)
    {
        $heartRateHistory = HeartRate::where('user_id', $userId)
            ->orderBy('timestamp', 'desc')
            ->take(100)
            ->get();

        return response()->json([
            'data' => $heartRateHistory
        ]);
    }
} 