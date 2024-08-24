<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag/dist/css/multi-select-tag.css">
<script src="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag/dist/js/multi-select-tag.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/flowbite.min.js"></script>

<x-app-layout>


    <div class="py-12">
        <div class="max-w-6xl mx-auto sm:px-2 lg:px-1 ">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <!-- success handling -->
                @if (session()->has('message'))
                <div class="bg-[#6A64F1] text-white text-sm font-bold px-4 py-3" role="alert">

                    <ul style="list-style-type: none; padding-left: 0;">
                        <!-- Apply inline style to remove list marker -->
                        <div class="flex items-center mb-2">
                            <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 20 20">
                                <path
                                    d="M12.432 0c1.34 0 2.01.912 2.01 1.957 0 1.305-1.164 2.512-2.679 2.512-1.269 0-2.009-.75-1.974-1.99C9.789 1.436 10.67 0 12.432 0zM8.309 20c-1.058 0-1.833-.652-1.093-3.524l1.214-5.092c.211-.814.246-1.141 0-1.141-.317 0-1.689.562-2.502 1.117l-.528-.88c2.572-2.186 5.531-3.467 6.801-3.467 1.057 0 1.233 1.273.705 3.23l-1.391 5.352c-.246.945-.141 1.271.106 1.271.317 0 1.357-.392 2.379-1.207l.6.814C12.098 19.02 9.365 20 8.309 20z" />
                            </svg>
                            {{ session()->get('message') }}
                        </div>
                    </ul>
                </div>
                @endif
                <!-- end success handling -->
                <div class="p-6 text-gray-900">
                    <div>
                        <script src="./node_modules/preline/dist/preline.js"></script>
                        <!-- component -->
                        <div class="flex items-center justify-center">
                            <!-- Author: FormBold Team -->
                            <!-- Learn More: https://formbold.com -->
                            <div class="mx-auto w-full max-w-[2000] bg-white">
                                <form class="py-6 px-9"
                                    action="{{ route('update', ['id' => $fileData->file_id, 'file_idID' => $fileData->file_idID]) }}"
                                    method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="grid gap-3 mb-6 md:grid-cols-3 border-b">
                                        <div class="mb-5">
                                            @php
                                            $user = Auth::user()->name
                                            @endphp
                                            <label for="email" class="mb-3 block text-base font-medium text-[#07074D]">
                                                Submitted by

                                            </label>

                                            <input type="text" name="file_submittedby" id="file_submittedby"
                                                value="<?php echo $user;?>" readonly
                                                placeholder=" {{ Auth::user()->name }}"
                                                class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                                        </div>

                                        <div class="mb-5">
                                            <label for="email" class="mb-3 block text-base font-medium text-[#07074D]">
                                                File ID

                                            </label>
                                            <div>
                                                <x-input-error :messages="$errors->get('file_idID')" class="mt-2" />
                                                <input oninput="this.value = this.value.toUpperCase()" type="text"
                                                    name="file_idID" id="file_idID"
                                                    placeholder="{{$fileData->file_idID}}"
                                                    value="{{$fileData->file_idID}}"
                                                    class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                                            </div>
                                        </div>
                                        <div class="mb-5">
                                            <label for="email" class="mb-3 block text-base font-medium text-[#07074D]">
                                                Laywer Assigned
                                            </label>
                                            <div>
                                                <x-input-error :messages="$errors->get('file_idID')" class="mt-2" />
                                                <input oninput="this.value = this.value.toUpperCase()"
                                                    name="file_authoredby" id="file_authoredby"
                                                    placeholder="{{$fileData->file_authoredby}}"
                                                    value="{{$fileData->file_authoredby}}"
                                                    class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                                            </div>
                                        </div>
                                    </div>


                                    <div class="grid gap-3 mb-6 md:grid-cols-3 border-b">
                                        <div class="mb-5">
                                            <label for="email" class="mb-3 block text-base font-medium text-[#07074D]">
                                                Input file details
                                            </label>
                                            <div>
                                                <x-input-error :messages="$errors->get('file_name')" class="mt-2" />
                                                <input oninput="this.value = this.value.toUpperCase()" name="file_name"
                                                    id="file_name" read only placeholder="{{$fileData->file_name}}"
                                                    value="{{$fileData->file_name}}"
                                                    class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                                            </div>
                                        </div>
                                        <div class="mb-5">
                                            <label for="email" class="mb-3 block text-base font-medium text-[#07074D]">
                                                File docket num
                                            </label>
                                            <div>
                                                <x-input-error :messages="$errors->get('file_docketnum')"
                                                    class="mt-2" />
                                                <input oninput="this.value = this.value.toUpperCase()"
                                                    name="file_docketnum" id="file_docketnum"
                                                    placeholder="{{$fileData->file_docketnum}}"
                                                    value="{{$fileData->file_docketnum}}"
                                                    class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                                            </div>
                                        </div>
                                        <div class="mb-5">
                                            <label for="email" class="mb-3 block text-base font-medium text-[#07074D]">
                                                Case status
                                            </label>
                                            <div>
                                                <x-input-error :messages="$errors->get('file_casestatus')"
                                                    class="mt-2" />
                                                <select name="file_casestatus" id="file_casestatus"
                                                    class="block appearance-none w-full bg-white border border-gray-200 hover:border-gray-200 px-6 py-3.5 font-medium  rounded shadow leading-tight focus:outline-none focus:shadow-outline">
                                                    <option selected>{{$fileData->file_casestatus}}</option>
                                                    <option>Open</option>
                                                    <option>Closed</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="grid gap-3 mb-6 md:grid-cols-4 border-b">

                                        <div class="mb-5">

                                            <label for="email" class="mb-3 block text-base font-medium text-[#07074D]">
                                                Client
                                            </label>

                                            <input
                                                class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
                                                type="text" name="file_client" id="file_client" read only
                                                value="{{ isset($clientData) ? $clientData->client_id : 'No data available' }}"
                                                placeholder="{{ isset($clientData) ? $clientData->client_id : 'No data available' }}">


                                        </div>



                                        <div class="mb-5">
                                            <label for="email" class="mb-3 block text-base font-medium text-[#07074D]">
                                                Client First Name
                                            </label>
                                            <input type="text" name="client_fname" id="client_fname"
                                                value="{{ $clientData->client_fname ?? 'No data available'}}"
                                                placeholder="{{ $clientData->client_fname ?? 'No data available'}}" read
                                                only
                                                class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                                        </div>

                                        <div class="mb-5">
                                            <label for="email" class="mb-3 block text-base font-medium text-[#07074D]">
                                                Client Middle Name
                                            </label>
                                            <input type="text" name="client_mname" id="client_mname"
                                                value="{{ $clientData->client_mname ?? 'No data available'}}"
                                                placeholder="{{ $clientData->client_mname ?? 'No data available'}}"
                                                class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                                        </div>

                                        <div class="mb-5">
                                            <label for="email" class="mb-3 block text-base font-medium text-[#07074D]">
                                                Client Last Name
                                            </label>
                                            <input type="text" name="client_sname" id="client_sname"
                                                vakue="{{ $clientData->client_sname ?? 'No data available'}}"
                                                placeholder="{{ $clientData->client_sname ?? 'No data available'}}"
                                                class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                                        </div>

                                    </div>
                                    <!-- file types drop down
                                    <label
                                        for="email"
                                        class="mb-3 block text-base font-medium text-[#07074D]"
                                        >
                                        Select file type:
                                    </label>

                                <select class="py-3 px-6" name="countries" id="countries" multiple>
                                    <option value="1">Afghanistan</option>
                                    <option value="2">Australia</option>
                                    <option value="3">Germany</option>
                                    <option value="4">Canada</option>
                                    <option value="5">Russia</option>
                                </select>

                                <script>
                                    new MultiSelectTag('countries')  // id
                                </script>

                                     filetype dropdown end -->


                                    <!--file case type checkbox -->
                                    <div class="grid gap-3 mb-6 md:grid-cols-3 ">
                                        <div class="mb-5">
                                            <label for="email" class="mb-3 block text-base font-medium text-[#07074D]">
                                                Case type
                                            </label>
                                            <div>
                                                <x-input-error :messages="$errors->get('file_casetype')" class="mt-2" />
                                                <select name="file_casetype" id="file_casetype"
                                                    class="block appearance-none w-full bg-white border border-gray-200 hover:border-gray-200 px-6 py-3.5 font-medium  rounded shadow leading-tight focus:outline-none focus:shadow-outline">
                                                    <option selected>{{$fileData->file_casetype}} </option>
                                                    <option>CRIMINAL CASE</option>
                                                    <option>CIVIL CASE</option>
                                                    <option>OTHERS</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="mb-5">
                                            <label for="email" class="mb-3 block text-base font-medium text-[#07074D]">
                                                Client Balance
                                            </label>
                                            <div>
                                                <x-input-error :messages="$errors->get('b_clientbalance')"
                                                    class="mt-2" />
                                                <input type="text" name="b_clientbalance" id="b_clientbalance"
                                                    value="{{ $billingData ? $billingData->b_clientbalance : 'No data available' }}"
                                                    class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md">
                                                <div class="mb-5">
                                                    <input style="display: none;" type="text" name="bclient_paystatus"
                                                        id="bclient_paystatus" placeholder="Status" value="Paid" read
                                                        only
                                                        class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                                                </div>
                                            </div>
                                        </div>

                                        <script>
                                            // Get references to the select box and text box
                                                        const file_casetype = document.getElementById('file_casetype');
                                                        const b_clientbalance = document.getElementById('b_clientbalance');
                                                        const bclient_paystatus = document.getElementById('bclient_paystatus');

                                                        // Add an event listener to the select box
                                                        file_casetype.addEventListener('change', function() {
                                                            // Get the selected value from the select box
                                                            const selectedValue = file_casetype.value;

                                                            // Set the value of the text box based on the selected value
                                                            if (selectedValue === 'Criminal Case') {
                                                                b_clientbalance.value = '50000';
                                                                bclient_paystatus.value = 'Unpaid';
                                                            } else if (selectedValue === 'Civil Case') {
                                                                b_clientbalance.value = '20000';
                                                                bclient_paystatus = 'Unpaid';
                                                            }
                                                        });
                                        </script>


                                        <div class="mb-5">
                                            <label for="email" class="mb-3 block text-base font-medium text-[#07074D]">
                                                Payment Status:
                                            </label>
                                            <div>
                                                <x-input-error :messages="$errors->get('b_paymethod')" class="mt-2" />
                                                <select name="b_paymethod" id="b_paymethod"
                                                    class="block appearance-none w-full bg-white border border-gray-200 hover:border-gray-200 px-6 py-3.5 font-medium  rounded shadow leading-tight focus:outline-none focus:shadow-outline">
                                                    <option selected>{{ $billingData ? $billingData->b_paymethod : 'No
                                                        data available' }}</option>
                                                    <option>DEBIT</option>
                                                    <option>CASH</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="mb-5">
                                            <label for="email" class="mb-3 block text-base font-medium text-[#07074D]">
                                                Branch
                                            </label>
                                            <div>
                                                <x-input-error :messages="$errors->get('file_branch')" class="mt-2" />
                                                <input oninput="this.value = this.value.toUpperCase()" type="text"
                                                    name="file_branch" id="file_branch"
                                                    placeholder="{{$fileData->file_branch ?? $fileData->file_branch}}"
                                                    value="{{$fileData->file_branch ?? $fileData->file_branch}}"
                                                    class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                                            </div>
                                        </div>
                                        <div class="mb-5">
                                            <label for="email" class="mb-3 block text-base font-medium text-[#07074D]">
                                                Court
                                            </label>
                                            <div>
                                                <x-input-error :messages="$errors->get('file_court')" class="mt-2" />
                                                <input oninput="this.value = this.value.toUpperCase()" type="text"
                                                    name="file_court" id="file_court"
                                                    placeholder="{{$fileData->file_court ?? $fileData->file_court}}"
                                                    value="{{$fileData->file_court ?? $fileData->file_court}}"
                                                    class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                                            </div>
                                        </div>
                                        <div class="mb-5">
                                            <label for="email" class="mb-3 block text-base font-medium text-[#07074D]">
                                                Case Remark
                                            </label>
                                            <div>
                                                <x-input-error :messages="$errors->get('file_remarks')" class="mt-2" />
                                                <input type="text" name="file_remarks" id="file_remarks"
                                                    placeholder="{{$fileData->file_remarks ?? $fileData->file_remarks}}"
                                                    value="{{$fileData->file_remarks ?? $fileData->file_remarks}}"
                                                    class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                                            </div>
                                        </div>

                                        <!--fle case type checkox end -->
                                    </div>
                                    <div class="grid gap-3 mb-6 md:grid-cols-3 border-b">

                                        <div class="mb-5">
                                            <label for="email" class="mb-3 block text-base font-medium text-[#07074D]">
                                                Case description
                                            </label>
                                            <div>
                                                <x-input-error :messages="$errors->get('file_court')" class="mt-2" />
                                                <input oninput="this.value = this.value.toUpperCase()" type="text"
                                                    name="file_casetypetype" id="file_casetypetype"
                                                    placeholder="{{$fileData->file_casetypetype ?? $fileData->file_casetypetype}}"
                                                    value="{{$fileData->file_casetypetype ?? $fileData->file_casetypetype}}"
                                                    class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                                            </div>
                                        </div>
                                        <!--fle case type checkox end -->
                                    </div>
                                    <div class="mb-5 pt-4 px-0">
                                        <label for="email" class="mb-3 block text-base font-medium text-[#07074D]">
                                            Upload file:
                                            <x-input-error :messages="$errors->get('file')" class="mt-2" />
                                        </label>
                                        <div class="mb-8">
                                            <div>
                                                @if ($fileData->file)
                                                <!-- Display the current filename and an option to replace the file -->
                                                <div>
                                                    <label class="block text-sm text-gray-500 font-semibold">Current
                                                        File:</label>
                                                    <p>{{ $fileData->file }}</p>
                                                </div>
                                                <div>
                                                    <label class="block text-sm text-gray-500 font-semibold">
                                                        Replace File:
                                                        <span class="sr-only">Browse</span>
                                                    </label>
                                                    <input name="file" id="fileupload" type="file"
                                                        class="block w-full text-sm text-gray-500 font-semibold file:mr-3 file:py-3 file:px-7 file:rounded-md file:border-0 file:text-base file:font-semibold bg-gray-50 rounded-md border-b file:bg-[#6A64F1] file:text-white">
                                                </div>
                                                @else
                                                <!-- Display the file input for a new file upload -->
                                                <label class="block text-sm text-gray-500 font-semibold">
                                                    Upload File:
                                                    <span class="sr-only">Browse</span>
                                                    <input name="file" id="fileupload" type="file"
                                                        class="block w-full text-sm text-gray-500 font-semibold file:mr-3 file:py-3 file:px-7 file:rounded-md file:border-0 file:text-base file:font-semibold bg-gray-50 rounded-md border-b file:bg-[#6A64F1] file:text-white">
                                                </label>
                                                @endif
                                            </div>
                                            <div class="py-5">
                                                <button onclick="return confirm('Continue updateing this file?')"
                                                    type="submit"
                                                    onclick="return confirm('Continue updating this file?')"
                                                    class="hover:shadow-form  rounded-md bg-[#6A64F1] py-3 px-8 text-center text-base font-semibold text-white outline-none">
                                                    Update File
                                                </button>
                                            </div>
                                        </div>

                                    </div>

                            </div>
                        </div>
                    </div>
                </div>
                <!--end component -->
                <div class="mb-8">

                    </form>
                </div>
            </div>
</x-app-layout>