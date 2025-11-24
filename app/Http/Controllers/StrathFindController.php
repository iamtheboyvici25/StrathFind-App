<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class StrathFindController extends Controller
{
    public function __invoke(): View
    {
        $stats = [
            ['label' => 'Items reported', 'value' => '482', 'trend' => '+18% vs last term'],
            ['label' => 'Items claimed', 'value' => '364', 'trend' => '76% recovery rate'],
            ['label' => 'Avg. match time', 'value' => '2.4 days', 'trend' => 'down 1.1 days'],
        ];

        $lostItems = [
            [
                'title' => 'Silver HP Laptop',
                'location' => 'Sir Henry Hall • Seat B12',
                'time' => 'Posted 15 mins ago',
                'tags' => ['Electronics', 'Urgent'],
                'description' => 'Sticker with “I ❤ Strath” on the lid, last seen during 11am lecture.',
            ],
            [
                'title' => 'Blue lab coat',
                'location' => 'Science Complex • Lab 3',
                'time' => '1 hour ago',
                'tags' => ['Apparel'],
                'description' => 'Name tag “L. Wanjiku” sewn inside, contains goggles in the pocket.',
            ],
            [
                'title' => 'Black backpack',
                'location' => 'Student Centre • Café Patio',
                'time' => 'Yesterday',
                'tags' => ['Personal'],
                'description' => 'Has chemistry notes + calculator. Zip has yellow ribbon.',
            ],
        ];

        $claims = [
            [
                'owner' => 'Tracy Mwangi',
                'item' => 'ID & Access Card',
                'status' => 'awaiting review',
                'submitted_at' => 'Today • 09:42',
                'detail' => 'Provided selfie + enrollment letter as proof.',
            ],
            [
                'owner' => 'Kevin Ouma',
                'item' => 'Graphic tablet',
                'status' => 'matched',
                'submitted_at' => 'Today • 08:10',
                'detail' => 'Cross-checked with security footage from design studio.',
            ],
            [
                'owner' => 'Amelia Njeri',
                'item' => 'Earbuds case',
                'status' => 'needs evidence',
                'submitted_at' => 'Yesterday • 17:55',
                'detail' => 'Asked to upload the purchase receipt before release.',
            ],
        ];

        $notifications = [
            ['type' => 'Match', 'message' => 'We think the HP laptop logged at Main Library matches your alert.', 'time' => '4 mins ago'],
            ['type' => 'Reminder', 'message' => 'Bring a student ID when collecting items from Security Desk.', 'time' => '32 mins ago'],
            ['type' => 'Alert', 'message' => '3 new items added around Student Centre. Set alerts to auto-track.', 'time' => '1 hour ago'],
        ];

        $faqs = [
            ['question' => 'How do I report a missing item?', 'answer' => 'Tap “Report Lost Item”, describe it clearly, add where/when you last had it, then add contact info.'],
            ['question' => 'Where do I collect a matched item?', 'answer' => 'Items are collected at the main security office. Bring your Strath ID and proof of ownership.'],
            ['question' => 'Can staff moderate claims?', 'answer' => 'Yes. Staff and admin roles can verify claims, update statuses, and broadcast alerts campus-wide.'],
        ];

        return view('strathfind.home', compact('stats', 'lostItems', 'claims', 'notifications', 'faqs'));
    }
}

