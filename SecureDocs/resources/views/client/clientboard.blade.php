<x-app-layout>    
    <div class="py-12">
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                <div class="p-4 w-full">
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
                            <div class="font-bold text-lg">{{$dataFromVerifyMethod->client_id}}</div>
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
                            <div class="font-bold text-lg">{{$dataFromVerifyMethod->client_lawyer}}</div>
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
                            <div class="text-sm text-gray-500">Submitted by</div>
                            <div class="font-bold text-lg">{{$dataFromVerifyMethod->client_submitby}}</div>
                        </div>
                        </div>
                    </div>
                    </div> 
                </div>
                </div>  
            </div>
            <!-- timeline -->
            <div class="flex-1 bg-white rounded-lg shadow-xl mt-4 p-8">
                        <div class="bg-white dark:bg-white-100 overflow-hidden shadow-sm sm:rounded-lg">       
                            <div class="p-4 border-b">
                                <h2 class="text-2xl font-bold ">
                                    Client Information
                                </h2>
                                <p class="text-sm text-gray-500">
                                    Personal details and application. 
                                </p>
                            </div>
                            <div>
                                <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
                                    <p class="text-gray-600 font-bold">
                                        Full name
                                    </p>
                                    <p>
                                        {{$dataFromVerifyMethod->client_fname}} {{$dataFromVerifyMethod->client_mname}} {{$dataFromVerifyMethod->client_sname}}
                                    </p>
                                </div>
                                <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
                                    <p class="text-gray-600 font-bold">
                                        Contact number
                                    </p>
                                    <p>
                                        {{$dataFromVerifyMethod->client_contactnum}}
                                    </p>
                                </div>
                                <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
                                    <p class="text-gray-600 font-bold">
                                        Email Address
                                    </p>
                                    <p>
                                        {{$dataFromVerifyMethod->client_emailadd}}
                                    </p>
                                </div>
                                <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
                                    <p class="text-gray-600 font-bold">
                                        Permanent Address
                                    </p>
                                    <p>
                                    {{$dataFromVerifyMethod->client_permadd}}
                                    </p>
                                </div>
                                <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
                                    <p class="text-gray-600 font-bold">
                                        Emergency contact
                                    </p>
                                    <p>
                                    {{$dataFromVerifyMethod->client_emcontactnum}}  
                                    </p>
                                </div> 
                                <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
                                    <p class="text-gray-600 font-bold">
                                        Emergency email
                                    </p>
                                    <p>
                                    {{$dataFromVerifyMethod->client_ememailadd}}  
                                    </p>
                                </div>
                                <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
                                    <p class="text-gray-600 font-bold">
                                        Emergency address
                                    </p>
                                    <p>
                                    {{$dataFromVerifyMethod->client_empermadd}}  
                                    </p>
                                </div> 
                                <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
                                    <p class="text-gray-600 font-bold">
                                        Opposing client full name
                                    </p>
                                    <p>
                                    {{$dataFromVerifyMethod->client_oppsfname}} {{$dataFromVerifyMethod->client_oppsmname}} {{$dataFromVerifyMethod->client_oppssname}} 
                                    </p>
                                </div> 
                                <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
                                    <p class="text-gray-600 font-bold">
                                        Opposing lawyer
                                    </p>
                                    <p>
                                    {{$dataFromVerifyMethod->client_oppslawyer}}
                                    </p>
                                </div>  
                                <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
                                    <p class="text-gray-600 font-bold">
                                        Opposing firm address
                                    </p>
                                    <p>
                                    {{$dataFromVerifyMethod->client_oppsfirmaddress}}
                                    </p>
                                </div>
                                <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
                                    <p class="text-gray-600 font-bold">
                                        Client bill status
                                    </p>
                                    <p>
                                    @if ($sum === 0 || is_null($sum))
                                            Paid
                                        @else
                                            Balance: {{$sum}} PHP
                                        @endif
                                    </p>                                
                                    
                                   
                                </div>    
                                <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
                                    <p class="text-gray-600 font-bold">
                                        Client Cases
                                    </p>
                                    <p>
                            
                                    Cases: @foreach ($filecasesData as $filecasesData) 
                                            | {{$filecasesData->file_name}} 
                                                    @endforeach
                                      
                                    </p>                                                                                                             
                                   
                                </div>    
                                <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4">
                                    <p class="text-gray-600 font-bold">
                                        Created at
                                    </p>
                                    <p>
                                    {{$dataFromVerifyMethod->created_at}}
                                    </p>
                                </div>      
                                
                                  
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

