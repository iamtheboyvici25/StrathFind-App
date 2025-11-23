<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - StrathFind</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <nav class="bg-blue-600 text-white p-4">
        <div class="container mx-auto flex justify-between items-center">
            <h1 class="text-2xl font-bold">StrathFind</h1>
            <div class="flex items-center gap-4">
                <span>Welcome, {{ auth()->user()->name }} ({{ auth()->user()->role->name }})</span>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="bg-red-500 px-4 py-2 rounded hover:bg-red-600">
                        Logout
                    </button>
                </form>
            </div>
        </div>
    </nav>

    <div class="container mx-auto mt-8 p-4">
        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <div class="grid md:grid-cols-3 gap-6">
            <!-- Student & Staff Access -->
            <div class="bg-white p-6 rounded-lg shadow">
                <h3 class="text-xl font-bold mb-4 text-blue-600">Lost Items</h3>
                <p class="text-gray-600 mb-4">Browse and claim lost items</p>
                <a href="#" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 inline-block">
                    View Items
                </a>
            </div>

            <!-- Admin Only -->
            @if(auth()->user()->isAdmin())
            <div class="bg-white p-6 rounded-lg shadow border-2 border-yellow-500">
                <h3 class="text-xl font-bold mb-4 text-yellow-600">Manage Users</h3>
                <p class="text-gray-600 mb-4">Admin access only</p>
                <a href="{{ route('admin.users') }}" class="bg-yellow-600 text-white px-4 py-2 rounded hover:bg-yellow-700 inline-block">
                    Manage Users
                </a>
            </div>

            <div class="bg-white p-6 rounded-lg shadow border-2 border-yellow-500">
                <h3 class="text-xl font-bold mb-4 text-yellow-600">Manage Items</h3>
                <p class="text-gray-600 mb-4">Admin access only</p>
                <a href="{{ route('admin.items') }}" class="bg-yellow-600 text-white px-4 py-2 rounded hover:bg-yellow-700 inline-block">
                    Manage Items
                </a>
            </div>
            @endif

            <!-- Staff Only -->
            @if(auth()->user()->isStaff())
            <div class="bg-white p-6 rounded-lg shadow border-2 border-green-500">
                <h3 class="text-xl font-bold mb-4 text-green-600">Verify Claims</h3>
                <p class="text-gray-600 mb-4">Staff access only</p>
                <a href="{{ route('staff.verify') }}" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700 inline-block">
                    Verify Claims
                </a>
            </div>
            @endif
        </div>

        <!-- Role Information -->
        <div class="mt-8 bg-blue-50 p-6 rounded-lg">
            <h3 class="text-xl font-bold mb-4">Your Permissions</h3>
            <ul class="list-disc list-inside space-y-2">
                @if(auth()->user()->isAdmin())
                    <li class="text-gray-700">✅ Full system access</li>
                    <li class="text-gray-700">✅ Manage all users</li>
                    <li class="text-gray-700">✅ Manage all items</li>
                    <li class="text-gray-700">✅ View reports</li>
                @elseif(auth()->user()->isStaff())
                    <li class="text-gray-700">✅ Verify claims</li>
                    <li class="text-gray-700">✅ Manage items</li>
                    <li class="text-gray-700">❌ Cannot manage users</li>
                @else
                    <li class="text-gray-700">✅ Browse items</li>
                    <li class="text-gray-700">✅ Submit claims</li>
                    <li class="text-gray-700">❌ Cannot verify claims</li>
                @endif
            </ul>
        </div>
    </div>
</body>