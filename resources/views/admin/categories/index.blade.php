@extends('layouts.app')

<body class="bg-gray-100" x-data="{ showSubcategory: false }">

    <div class="container mx-auto py-8">
        <h1 class="text-2xl font-bold mb-4">Sports Categories Management</h1>

        <!-- Category Form -->
        <div class="bg-white rounded-lg shadow-md p-6 mb-6">
            <h2 class="text-xl font-semibold mb-4">Add/Update Category</h2>
            <form action="/admin/categories" method="POST">
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700" for="category-name">Category Name</label>
                    <input
                        class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                        id="category-name" type="text" name="category_name" required>
                </div>
                <!-- Toggle Subcategory Input -->
                <div class="mb-4" x-show="showSubcategory">
                    <label class="block text-sm font-medium text-gray-700" for="subcategory-name">Subcategory
                        Name</label>
                    <input
                        class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                        id="subcategory-name" type="text" name="subcategory_name">
                </div>
                <button
                    class="inline-flex items-center px-4 py-2 border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                    type="button" @click="showSubcategory = !showSubcategory">
                    AddSubCategory
                </button><br /><br />
                <button
                    class="inline-flex items-center px-4 py-2 border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                    type="submit">
                    Save Category
                </button>
            </form>
        </div>

        <!-- Categories List -->
        <div class="bg-white rounded-lg shadow-md p-6">
            <h2 class="text-xl font-semibold mb-4">Existing Categories</h2>
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Category</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Subcategories</th>
                        <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    <!-- Example Row -->
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">Sports Gear</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Football, Basketball</td>
                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                            <button class="text-indigo-600 hover:text-indigo-900">Edit</button>
                            <button class="text-red-600 hover:text-red-900 ml-4">Delete</button>
                        </td>
                    </tr>
                    <!-- Repeat for other categories -->
                </tbody>
            </table>
        </div>
    </div>

</body>
