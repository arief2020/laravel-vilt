<template>
    <div class="min-h-screen flex bg-gray-100">
        <!-- Sidebar -->
        <aside class="w-64 bg-white shadow-lg">
            <div class="px-6 py-4">
                <h2 class="text-2xl font-bold">System Inventory</h2>
            </div>
            <nav class="mt-8">
                <ul class="space-y-2">
                    <li>
                        <a
                            href="/dashboard"
                            class="block px-6 py-2 text-gray-700 hover:bg-gray-200"
                        >
                            Dashboard
                        </a>
                    </li>
                    <li>
                        <a
                            href="/products"
                            class="block px-6 py-2 text-gray-700 hover:bg-gray-200"
                        >
                            Product
                        </a>
                    </li>
                    <li>
                        <a
                            href="/transactions"
                            class="block px-6 py-2 text-gray-700 hover:bg-gray-200"
                        >
                            Transaction
                        </a>
                    </li>
                    <li>
                        <a
                            href="/reports"
                            class="block px-6 py-2 text-gray-700 hover:bg-gray-200"
                        >
                            Report
                        </a>
                    </li>
                    <li>
                        <form method="GET" action="/logout">
                            <button
                                type="submit"
                                class="w-full text-left px-6 py-2 text-gray-700 hover:bg-gray-200"
                            >
                                Logout
                            </button>
                        </form>
                    </li>
                </ul>
            </nav>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 p-8">
            <slot></slot>
        </main>
    </div>
</template>

<script setup>
// No additional logic needed for layout
</script>
