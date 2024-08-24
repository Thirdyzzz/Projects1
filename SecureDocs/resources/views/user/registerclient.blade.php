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
                  <!-- success handling -->
             @if (session()->has('message'))
                    <div class="bg-[#6A64F1] text-white text-sm font-bold px-4 py-3" role="alert">
                        <ul style="list-style-type: none; padding-left: 0;">
                            <!-- Apply inline style to remove list marker -->
                            <div class="flex items-center mb-2">
                                <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path
                                        d="M12.432 0c1.34 0 2.01.912 2.01 1.957 0 1.305-1.164 2.512-2.679 2.512-1.269 0-2.009-.75-1.974-1.99C9.789 1.436 10.67 0 12.432 0zM8.309 20c-1.058 0-1.833-.652-1.093-3.524l1.214-5.092c.211-.814.246-1.141 0-1.141-.317 0-1.689.562-2.502 1.117l-.528-.88c2.572-2.186 5.531-3.467 6.801-3.467 1.057 0 1.233 1.273.705 3.23l-1.391 5.352c-.246.945-.141 1.271.106 1.271.317 0 1.357-.392 2.379-1.207l.6.814C12.098 19.02 9.365 20 8.309 20z" />
                                </svg>
                                {{ session()->get('message') }}
                            </div>
                        </ul>
                    </div>
                @elseif ($errors->has('email'))
                    <div class="bg-red-500 text-white text-sm font-bold px-4 py-3" role="alert">
                        <ul style="list-style-type: none; padding-left: 0;">
                            <!-- Apply inline style to remove list marker -->
                            <div class="flex items-center mb-2">
                                <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path
                                        d="M12.432 0c1.34 0 2.01.912 2.01 1.957 0 1.305-1.164 2.512-2.679 2.512-1.269 0-2.009-.75-1.974-1.99C9.789 1.436 10.67 0 12.432 0zM8.309 20c-1.058 0-1.833-.652-1.093-3.524l1.214-5.092c.211-.814.246-1.141 0-1.141-.317 0-1.689.562-2.502 1.117l-.528-.88c2.572-2.186 5.531-3.467 6.801-3.467 1.057 0 1.233 1.273.705 3.23l-1.391 5.352c-.246.945-.141 1.271.106 1.271.317 0 1.357-.392 2.379-1.207l.6.814C12.098 19.02 9.365 20 8.309 20z" />
                                </svg>
                                {{ $errors->first('email') }}
                            </div>
                        </ul>
                    </div>
                @endif
                <!--end error handling -->
                
            <form
                                    class="py-6 px-9"
                                    action="{{ route('registerclient', ['submitted_by' => Auth::user()->name]) }}"
                                    method="POST"
                                   
                                    >
                @csrf
                <div class="p-6 text-gray-900">
                
                        <div class="grid gap-3 mb- md:grid-cols-4 border-b ">                        
                            <div class="mb-5">
                                    <label
                                        for="email"
                                        class="mb-3 block text-base font-medium text-[#07074D]"
                                        >
                                        Client fullame
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
                                            class="hidden"
                                            > </input>


                                            <input
                                            type="text"
                                            name="name"
                                            id="name"
                                            value="{{$clientData->client_fname}} {{$clientData->client_mname}} {{$clientData->client_sname}}"
                                            placeholder="{{$clientData->client_fname}} {{$clientData->client_mname}} {{$clientData->client_sname}}"
                                            class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
                                            disable
                                            readonly
                                            />
                                </div>

                                <div class="mb-5">
                                    <label
                                        for="email"
                                        class="mb-3 block text-base font-medium text-[#07074D]"
                                        >
                                        Client email
                                    </label>
                                    
                                    <input
                                            type="email"
                                            name="email"
                                            id="email"
                                            value="{{$clientData->client_emailadd}}"
                                            placeholder="{{$clientData->client_emailadd}}"
                                            class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
                                            
                                            readonly
                                            />
                                </div>
                                
                            </div>           
                            <div class="grid gap-3 mb- md:grid-cols-4 border-b">                        
                            
                                <div class="mb-5">
                                    <label
                                        for="email"
                                        class="mb-3 block text-base font-medium text-[#07074D]"
                                        >
                                    Password
                                    </label> 
                                        <div class="mb-5">
                                            <input
                                            type="password"
                                            name="password"
                                            id="password"
                                            placeholder="Password"
                                            class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
                                            />
                                        </div>
                                    </div>
                                    <div class="mb-5">
                                    <label
                                        for="email"
                                        class="mb-3 block text-base font-medium text-[#07074D]"
                                        >
                                        Confirm Password
                                    </label> 
                                        <div class="mb-5">
                                            <input
                                            type="password"
                                            name="confirm_password"
                                            id="confirm_password"
                                            placeholder="Confirm password"
                                            class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
                                            />
                                        </div>
                                    </div>
                                    
                                    
                                </div>
                                
                                    <div class="py-5">
                                <button
                                id="submitBtn" onclick="return confirm('Register client?')" disabled type="submit" class="hover:shadow-form  rounded-md bg-[#6A64F1] py-3 px-8 text-center text-base font-semibold text-white outline-none"
                                >
                                Register client
                                </button>
                                    </div>                                  
                                    <script>
                                    const passwordInput = document.getElementById('password');
                                    const confirmPasswordInput = document.getElementById('confirm_password');
                                    const submitBtn = document.getElementById('submitBtn');

                                    passwordInput.addEventListener('input', toggleSubmitButton);
                                    confirmPasswordInput.addEventListener('input', toggleSubmitButton);

                                    function toggleSubmitButton() {
                                        if (passwordInput.value === confirmPasswordInput.value) {
                                            submitBtn.removeAttribute('disabled');
                                        } else {
                                            submitBtn.setAttribute('disabled', 'disabled');
                                        }
                                    }
                                </script
                                                <!--  end for adding balances for client -->
                            </div> 
                        </div>  
                    </form> 
                </div>
            </div>
        </div>                    
    </div>
</x-app-layout>
