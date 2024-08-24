<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag/dist/css/multi-select-tag.css">
<script src="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag/dist/js/multi-select-tag.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/flowbite.min.js"></script>

<x-app-layout>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 px-1">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                <div class="p-4 w-full ">
                    <div class="grid grid-cols-9 gap-10 px-10">
                    <div class="col-span-12 sm:col-span-6 md:col-span-3">
                        <div class="flex flex-row bg-white shadow-sm rounded p-4">
                        <div class="flex items-center justify-center flex-shrink-0 h-12 w-12 rounded-xl bg-purple-100 text-purple-500">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" width="1.5rem" height="1.5rem">
                            <path strokeLinecap="round" strokeLinejoin="round" stroke-width="2" d="M5.25 8.25h15m-16.5 7.5h15m-1.8-13.5l-3.9 19.5m-2.1-19.5l-3.9 19.5" />
                        </svg>
                        </div>
                       
                        <div class="flex flex-col flex-grow ml-4">
                            <div class="text-sm text-gray-500">Client id</div>
                            <div class="font-bold text-lg">{{$clientData->client_id}} </div>
                            
                        </div>                   
                    </div>

                    </div>
                    <div class="col-span-12 sm:col-span-6 md:col-span-3">
                        <div class="flex flex-row bg-white shadow-sm rounded p-4">
                        <div class="flex items-center justify-center flex-shrink-0 h-12 w-12 rounded-xl bg-purple-100 text-purple-500">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" width="1.5rem" height="1.5rem">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9.879 7.519c1.171-1.025 3.071-1.025 4.242 0 1.172 1.025 1.172 2.687 0 3.712-.203.179-.43.326-.67.442-.745.361-1.45.999-1.45 1.827v.75M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9 5.25h.008v.008H12v-.008z" />
                        </svg>
                        </div>
                        <div class="flex flex-col flex-grow ml-4">
                            <div class="text-sm text-gray-500">Client fullname</div>
                            <div class="font-bold text-lg">{{$clientData->client_fname}} {{$clientData->client_mname}} {{$clientData->client_sname}}</div>
                        </div>
                        </div>
                    </div>
                    <div class="col-span-12 sm:col-span-6 md:col-span-3">
                        <div class="flex flex-row bg-white shadow-sm rounded p-4">
                        <div class="flex items-center justify-center flex-shrink-0 h-12 w-12 rounded-xl bg-purple-100 text-purple-500">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" width="1.5rem" height="1.5rem">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9.879 7.519c1.171-1.025 3.071-1.025 4.242 0 1.172 1.025 1.172 2.687 0 3.712-.203.179-.43.326-.67.442-.745.361-1.45.999-1.45 1.827v.75M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9 5.25h.008v.008H12v-.008z" />
                        </svg>
                        </div>
                        <div class="flex flex-col flex-grow ml-4">
                            <div class="text-sm text-gray-500">Client lawyer</div>
                            <div class="font-bold text-lg">{{$clientData->client_lawyer}}</div>
                        </div>
                        </div>
                    </div>
                    </div> 
                </div>
                </div>  
            </div>
        </div>

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 px-1 py-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <form
                                    class="py-6 px-9"
                                    action="{{ route('addclientbalance') }}"
                                    method="POST"
                                   
                                    >
                @csrf
                <div class="p-6 text-gray-900">
                
                        <div class="grid gap-3 mb- md:grid-cols-4 ">                        
                            <div class="mb-5">
                                    <label
                                        for="email"
                                        class="mb-3 block text-base font-medium text-[#07074D]"
                                        >
                                        Case type
                                    </label>
                                    @php
                                                $valueID = $clientData->client_id;
                                            @endphp
                                    <input type="text"
                                            name="client_id"
                                            id="client_id"                                        
                                            value="<?php echo $valueID; ?>"
                                            placeholder="<?php echo $valueID; ?>" 
                                            readonly
                                            > </input>


                                    <select name="b_casetype" id="b_casetype" class="block appearance-none w-full bg-white border border-gray-200 hover:border-gray-200 px-6 py-3.5 font-medium  rounded shadow leading-tight focus:outline-none focus:shadow-outline">
                                    <option selected disabled>Select case type </option>
                                            <option>Criminal Case</option>
                                            <option>Civil Case</option>          
                                    </select>
                                </div>

                                <div class="mb-5">
                                    <label
                                        for="email"
                                        class="mb-3 block text-base font-medium text-[#07074D]"
                                        >
                                        Payment Method
                                    </label>
                                    
                                    <select name="b_paymethod" id="b_paymethod" class="block appearance-none w-full bg-white border border-gray-200 hover:border-gray-200 px-6 py-3.5 font-medium  rounded shadow leading-tight focus:outline-none focus:shadow-outline">
                                    <option selected disabled>Select pay method </option>
                                            <option>Debit</option>
                                            <option>Cash</option>          
                                    </select>
                                </div>
                                <div class="mb-5">
                                    <label
                                        for="email"
                                        class="mb-3 block text-base font-medium text-[#07074D]"
                                        >
                                        Add balance
                                    </label> 
                                        <div class="mb-5">
                                            <input
                                            type="text"
                                            name="b_clientbalance"
                                            id="b_clientbalance"
                                            placeholder="Balance"
                                            class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
                                            />
                                        </div>
                                    </div>
                                    <div class="mb-5">
                                    <label
                                        for="email"
                                        class="mb-3 block text-base font-medium text-[#07074D]"
                                        >
                                        Status
                                    </label> 
                                        <div class="mb-5">
                                            <input
                                            type="text"
                                            name="bclient_paystatus"
                                            id="bclient_paystatus"
                                            placeholder="Status"
                                            value ="Status"
                                            read only
                                            class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
                                            />
                                        </div>
                                    </div>

                                    <script>
                                        document.addEventListener('DOMContentLoaded', function() {
                                            const b_clientbalance = document.getElementById('b_clientbalance');
                                            const bclient_paystatus = document.getElementById('bclient_paystatus');

                                            b_clientbalance.addEventListener('input', function() {
                                                const inputValue = b_clientbalance.value;
                                                if (/^\d+$/.test(inputValue)) {
                                                    bclient_paystatus.value = 'Unpaid';
                                                } else {
                                                    bclient_paystatus.value = 'Paid';
                                                }
                                            });
                                        });
                                    </script>
                            </div>           
                            <div class="grid gap-3 mb- md:grid-cols-4 border-b">                        
                            
                                <div class="mb-5">
                                    <label
                                        for="email"
                                        class="mb-3 block text-base font-medium text-[#07074D]"
                                        >
                                        Case description
                                    </label> 
                                        <div class="mb-5">
                                            <input
                                            type="text"
                                            name="file_docketnum"
                                            id="textBox1"
                                            placeholder="Balance"
                                            class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
                                            />
                                        </div>
                                    </div>
                                    
                                    </div>
                                    <div class="py-5">
                                <button
                                type="submit" class="hover:shadow-form  rounded-md bg-[#6A64F1] py-3 px-8 text-center text-base font-semibold text-white outline-none"
                                >
                                Add balance
                                </button>
                                    </div>                                  
                                                <!--  end for adding balances for client -->
                            </div> 
                        </div>  
                    </form> 
                </div>
            </div>
        </div>                    
    </div>
</x-app-layout>
