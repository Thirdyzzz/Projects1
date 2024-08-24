<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag/dist/css/multi-select-tag.css">
<script src="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag/dist/js/multi-select-tag.js"></script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/flowbite.min.js"></script>

<x-app-layout>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-1 lg:px-3">
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
                        <div class="flex items-center justify-center p-5">
                            <!-- Author: FormBold Team -->
                            <!-- Learn More: https://formbold.com -->
                            <div class="mx-auto w-full max-w-[2000] bg-white">
                                <form class="py-6 px-9" action="{{route ('restest')}}" method="POST">
                                    @csrf
                                    <label for="email" class="mb-3 block text-base font-medium text-[#07074D]">
                                        Submitted by:
                                    </label>
                                    <div class="grid gap-1 mb-2 md:grid-cols-3">

                                        @php
                                        $user = Auth::user()->name;
                                        @endphp
                                        <input oninput="this.value = this.value.toUpperCase()" type="text" name="client_submitby" id="client_submitby"
                                            value="<?php echo $user; ?>" readonly
                                            placeholder=" {{ Auth::user()->name }}"
                                            class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                                    </div>
                                    <label for="email" class="mb-3 block text-base font-medium text-[#07074D]">
                                        Client lawyer/lawyers:
                                    </label>
                                    <div class="grid gap-3 mb-2 md:grid-cols-2">       
                                    <div>
                                    <x-input-error :messages="$errors->get('client_lawyer')" class="mt-2" />
                                        <input oninput="this.value = this.value.toUpperCase()" type="text" name="client_lawyer" id="client_lawyer"
                                            value="{{old('client_lawyer')}}" placeholder="Lawyer"
                                            class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                                    </div>
                                    </div>
                                    <label for="clientinfo" class="mb-3 block text-base font-medium text-[#07074D]">
                                        Client information:
                                    </label>
                                    <div class="grid gap-3 mb-6 md:grid-cols-3">
                                    <div>
                                    <x-input-error :messages="$errors->get('client_fname')" class="mt-2" />
                                        <input oninput="this.value = this.value.toUpperCase()" type="text" name="client_fname" id="client_fname" value="{{old('client_fname')}}"
                                            placeholder="First name"
                                            class="w-full  rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                                    </div>
                                    <div>
                                    <x-input-error :messages="$errors->get('client_mname')" class="mt-2" />
                                        <input oninput="this.value = this.value.toUpperCase()" type="text" name="client_mname" id="client_mname" value="{{old('client_mname')}}"
                                            placeholder="Middle name"
                                            class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                                    </div>
                                    <div>
                                    <x-input-error :messages="$errors->get('client_sname')" class="mt-2" />
                                        <input oninput="this.value = this.value.toUpperCase()" type="text" name="client_sname" id="client_sname" placeholder="Last name" value="{{old('client_sname')}}"
                                            class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                                    </div>
                                    </div>                                  
                                    <label for="coninfo" class="mb-3 block text-base font-medium text-[#07074D]">
                                        Contact information:
                                    </label>
                                    <div class="grid gap-3 mb-6 md:grid-cols-2">
                                    <div>
                                    <x-input-error :messages="$errors->get('client_contactnum')" class="mt-2" />
                                        <input oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                            type = "number"
                                            maxlength = "11"
                                            pattern="/^-?\d+\.?\d*$/"
                                            type="number" name="client_contactnum" id="client_contactnum" value="{{old('client_contactnum')}}"
                                            placeholder="Contact number"
                                            class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                                    </div>
                                    <div>
                                    <x-input-error :messages="$errors->get('client_ememailadd')" class="mt-2" />
                                        <input type="email" name="client_emailadd" id="client_emailadd" value="{{old('client_emailadd')}}"
                                            placeholder="Email address"
                                            class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                                    </div>
                                    </div>

                                    <div class="mb-5">
                                        <div>
                                        <x-input-error :messages="$errors->get('client_ememailadd')" class="mt-2" />
                                        <input oninput="this.value = this.value.toUpperCase()" type="text" name="client_permadd" id="client_permadd" value="{{old('client_permadd')}}"
                                            placeholder="Permanent address"
                                            class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                                        </div>
                                    </div>

                                    <!-- emergency contanct info start -->
                                    <label for="coninfo" class="mb-3 block text-base font-medium text-[#07074D]">
                                        Emergency contact information:
                                    </label>
                                    
                                    <div class="grid gap-3 mb-6 md:grid-cols-2">

                                    <div>
                                    <x-input-error :messages="$errors->get('client_emcontactnum')" class="mt-2" />
                                        <input oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                            type = "number"
                                            maxlength = "11"
                                            type="number" name="client_emcontactnum" id="client_emcontactnum" value="{{old('client_emcontactnum')}}"
                                            placeholder="Contact number"
                                            class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                                    </div>
                                    <div>
                                    <x-input-error :messages="$errors->get('client_ememailadd')" class="mt-2" />
                                        <input type="email" name="client_ememailadd" id="client_ememailadd" value="{{old('client_ememailadd')}}"
                                            placeholder="Email address"
                                            class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                                    </div>
                                    </div>
                                    <div class="mb-5">
                                        <div>
                                        <x-input-error :messages="$errors->get('client_empermadd')" class="mt-2" />
                                        <input oninput="this.value = this.value.toUpperCase()" type="text" name="client_empermadd" id="client_empermadd" value="{{old('client_empermadd')}}"
                                            placeholder="Address"
                                            class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                                        </div>
                                    </div>
                                    <!-- end for emergency contact  -->

                                    <!-- start for client bill details -->
                                    <label for="email" class="mb-3 block text-base font-medium text-[#07074D]">
                                        Client type:
                                    </label>
                                    <div class="grid gap-3 mb-3 md:grid-cols-3">
                                        <div>
                                        <x-input-error :messages="$errors->get('client_type')" class="mt-2" />
                                            <select name="client_type"
                                                class="block appearance-none w-full bg-white border border-gray-200 hover:border-gray-200  py-3.5 font-medium  rounded shadow leading-tight focus:outline-none focus:shadow-outline">
                                                <option selected disabled>Choose type</option>
                                                <option value="Deffendant">DEFFENDANT</option>
                                                <option value="Plaintiff">PLAINTIFF</option>
                                            </select>
                                        </div>
                                        <!-- end for client bill details -->
                                    </div>

                                    <!-- optional for opposing party -->
                                    <label for="email" class=" block text-base font-medium text-[#07074D]">
                                        Opposing party details:
                                    </label>
                                    <br>
                                    <div class="grid gap-3 mb-6 md:grid-cols-3">
                                        <div>
                                       
                                        <input oninput="this.value = this.value.toUpperCase()" type="text" name="client_oppsfname" id="client_oppsfname" value="{{old('client_oppsfname')}}"
                                            placeholder="First name"
                                            class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                                        </div>
                                        
                                        <div>
                                        
                                        <input oninput="this.value = this.value.toUpperCase()"  type="text" name="client_oppsmname" id="client_oppsmname" value="{{old('client_oppsmname')}}"
                                            placeholder="Middle name"
                                            class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                                        </div>

                                        <div>
                                       
                                        <input oninput="this.value = this.value.toUpperCase()" type="text" name="client_oppssname" id="client_oppssname" value="{{old('client_oppssname')}}"
                                            placeholder="Last name"
                                            class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                                        </div>

                                        <!-- end for optional opposing party -->
                                    </div>
                                    <!-- oppposing lawyer additional details start -->
                                    <div class="grid gap-3 mb-6 md:grid-cols-2">
                                        <div>
                                            
                                            <input oninput="this.value = this.value.toUpperCase()"  type="text" name="client_oppslawyer" id="client_oppslawyer" value="{{old('client_oppslawyer')}}"
                                                placeholder="Opposing lawyer"
                                                class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                                        </div>
                                        <div>
                                       
                                        <input  oninput="this.value = this.value.toUpperCase()" type="text" name="client_oppsfirmaddress" id="client_oppsfirmaddress" value="{{old('client_oppsfirmaddress')}}"
                                            placeholder="Opposing office address"
                                            class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                                        </div>
                                        <!-- end for optional opposing party -->
                                    </div>
                                    <!-- end for additional details -->

                                    <button type="submit"
                                    onclick="return confirm('Continue adding this client?')" class="rounded-md bg-[#6A64F1] py-3 px-12 text-center text-base font-semibold text-white outline-none">
                                        Submit
                                    </button>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
            </form>
            <!--end component #6A64F1 -->
        </div>


    </div>
</x-app-layout>
