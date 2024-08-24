<x-guest-layout>
    <div class="">
        <div class="max-w-4xl sm:px-1 lg:px-1">
            <h2 class=" font-black  text-base text-gray-800">
                {{ __('View Verification.') }}
            </h2>     
                 <form method="POST" action="{{ route('verifyprocess', ['file_client' => $datafromclient->client_id]) }}">
                    @csrf
                            <h2 class="py-3 font-small text-sm text-gray-800">
                                {{ __('Please enter your password to view the file.') }}
                                <x-input-error :messages="$errors->get('password')" class="mt-2" />
                            </h2>
                            
                                <input
                                    type="password"
                                    name="userpass"
                                    id="userpass"
                                    placeholder="User password"
                                    class="w-full rounded-md border border-[#e0e0e0] bg-white py-2 px-3 text-sm font-small text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
                                />
                                 <input
                                    type="hidden"
                                    name="hiddendata"
                                    id="hiddendata"
                                    value="{{$datafromclient->client_id}}"
                                    class="hidden"
                                />
                                <input
                                    type="hidden"
                                    name="hiddendata"
                                    id="hiddendata"
                                    value="{{$dataFromVerifyMethod->file_id}}"
                                    class="hidden"
                                />
                        <div class="mt-3 flex justify-between" >
                            
                                    <button  type="submit" class="rounded-md bg-[#6A64F1] py-1 px-7  font-light text-sm text-white outline-none">
                                        Submit
                                    </button>
                </form>    
                <form method="get" action="{{ route('adminfiletable') }}">
                    @csrf
                            <button type="submit" class=" underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 px-3">
                                    {{ __('Go Back') }}
                            </button>
                </form>  
         </div>
    </div>
</x-guest-layout>
