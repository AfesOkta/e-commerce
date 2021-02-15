<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Product') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-10xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <!-- Products List Header -->
                                <div class="card-header">
                                    <h3 class="card-title">Products</h3>
                                </div>
                                <!-- End Products List Header -->
                                <!-- Products List Body-->
                                <div class="card-body">
                                    <!-- Table -->
                                    <table id="productTbl" class="table table-bordered table-striped">
                                        <!-- Table Header -->
                                        <thead class="bg-info">
                                        <!-- Table Row -->
                                        <tr>
                                            <!-- Table Header Column 1 -->
                                            <th style="width: 1rem;">
                                                <div class="icheck-primary d-inline">
                                                    <input type="checkbox" class="selectall" id="checkboxPrimary">
                                                    <label for="checkboxPrimary">
                                                    </label>
                                                </div>
                                            </th>
                                            <!-- End Table Header Column 1 -->
                                            <!-- Table Header Column 2 -->
                                            <th class="sku">SKU</th>
                                            <!-- End Table Header Column 2 -->
                                            <!-- Table Header Column 3 -->
                                            <th class="image">Main Image</th>
                                            <!-- End Table Header Column 3 -->
                                            <!-- Table Header Column 4 -->
                                            <th>Name</th>
                                            <!-- End Table Header Column 4 -->
                                            <!-- Table Header Column 5 -->
                                            <th style="width: 2rem;">Harga</th>
                                            <!-- End Table Header Column 5 -->
                                            <!-- Table Header Column 6 -->
                                            <th style="width: 2rem;" class="action">Actions</th>
                                            <!-- End Table Header Column 6 -->
                                        </tr>
                                        <!-- End Table Row -->
                                        </thead>
                                        <!-- End Table Header -->
                                        <!-- Products List Table Body -->
                                        <tbody>

                                        </tbody>
                                        <!-- End Products List Table Body -->
                                    </table>
                                    <!-- End Products List Table -->
                                </div>
                                <!-- End Products List Body-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
