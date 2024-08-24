<x-app-layout>

<div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div>              
                    <script src="./node_modules/preline/dist/preline.js"></script>
                            <!-- component -->
                                <div class="flex items-center justify-center p-12">
                                <!-- Author: FormBold Team -->
                                <!-- Learn More: https://formbold.com -->
                                
                           
                                    <div class="grid gap-3 mb-6 md:grid-cols-5">
                                    <form action="{{ route('useraddfile') }}" method="GET" >
                                    <div class="mb-5">
                                    
                                    <label
                                                    for="email"
                                                    class="mb-3 block text-base font-medium text-[#07074D]"
                                                    >
                                                Search Client #:
                                    </label>
                                    
                                        <input class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" 
                                        type="text" 
                                        name="file_client"
                                        id="file_client"
                                        value="{{ $data->client_id ?? 'No data available'}}" 
                                        placeholder="Search client ID">
                                       
                                   
                                    </div>
                                    
                                    <div class="mb-5">
                                    <label
                                                    for="email"
                                                    class="mb-3 block text-base font-medium text-[#ffffff]"
                                                    >
                                                %%
                                    </label>  
                                    <button class="hover:shadow-form w-full rounded-md bg-[#6A64F1] py-3 px-12 text-center text-base font-semibold text-white outline-none" type="submit">Search</button>
                                                
                                                <!-- <select class="w-full block appearance-none bg-white border border-gray-200 hover:border-gray-200 px-6 py-3.5 font-medium  rounded shadow leading-tight focus:outline-none focus:shadow-outline">
                                                        <option selected disabled>Select case status </option> 
                                                      
                                                        <option>ID </option>
                                                        
                                                    </select> -->
                                        </div>
                                    </form>    
                                  
                                        <div class="mb-5">
                                                <label
                                                    for="email"
                                                    class="mb-3 block text-base font-medium text-[#07074D]"
                                                    >
                                                    Client First Name:
                                            </label>   
                                                    <input
                                                        type="text"
                                                        name="client_fname"
                                                        id="client_fname"
                                                        value="{{ $data->client_fname ?? 'No data available'}}"
                                                        placeholder="First name"
                                                        read only
                                                        class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
                                                    />
                                        </div>

                                        <div class="mb-5">
                                                <label
                                                    for="email"
                                                    class="mb-3 block text-base font-medium text-[#07074D]"
                                                    >
                                                    Client Middle Name:
                                            </label>   
                                                    <input
                                                        type="text"
                                                        name="client_mname"
                                                        id="client_mname"
                                                        placeholder="{{ $data->client_mname ?? 'No data available'}}"
                                                        class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
                                                    />
                                        </div>

                                        <div class="mb-5">
                                                <label
                                                    for="email"
                                                    class="mb-3 block text-base font-medium text-[#07074D]"
                                                    >
                                                    Client Last Name:
                                            </label>   
                                                    <input
                                                        type="text"
                                                        name="client_sname"
                                                        id="client_sname"
                                                        placeholder="{{ $data->client_sname ?? 'No data available'}}"
                                                        class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
                                                    />
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


                                    <!-- checkbox -->
                                   
                                    <!-- checkox end -->
                                  
                             </form>  
                        </div>
    </div>
</x-app-layout>
