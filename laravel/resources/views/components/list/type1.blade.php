@if (count($data) > 0)
    @foreach ($data as $item)
        <div class="col-span-12 intro-y md:col-span-6 lg:col-span-4">
            <div class="box">
                <div class="flex items-start px-5 pt-5">
                    <div class="flex flex-col items-center w-full lg:flex-row">
                        <div class="w-16 h-16 image-fit">
                            <img alt="{{ $item->image }}" class="rounded-full"
                                src="{{ App\Helpers\Common::getImagePeople($item->image ?? '') }}">
                        </div>
                        <div class="mt-3 text-center lg:ml-4 lg:text-left lg:mt-0">
                            <a href="" class="font-medium">{{ $item->name }}</a>
                            <div
                                class="flex items-center text-slate-500 text-xs mt-0.5 {{ $item->status == ACTIVE ? 'text-success' : 'text-danger' }}">
                                <i data-lucide="{{ $item->status == ACTIVE ? 'check-square' : 'x-square' }}"
                                    class="w-4 h-4 mr-2"></i>
                                {{ __('messages.web.common.' . $item->status) }}
                            </div>
                        </div>
                    </div>
                    <div class="absolute top-0 right-0 mt-3 mr-5 dropdown">
                        <a class="block w-5 h-5 dropdown-toggle" href="javascript:;" aria-expanded="false"
                            data-tw-toggle="dropdown"> <i data-lucide="more-horizontal"
                                class="w-5 h-5 text-slate-500"></i>
                        </a>
                        <div class="w-40 dropdown-menu">
                            <div class="dropdown-content">
                                <a href="" class="dropdown-item"> <i data-lucide="edit-2"
                                        class="w-4 h-4 mr-2"></i>
                                    {{ __('messages.web.common.edit') }} </a>
                                <a href="" class="dropdown-item"> <i data-lucide="trash"
                                        class="w-4 h-4 mr-2"></i>
                                    {{ __('messages.web.common.delete') }} </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="p-5 text-center lg:text-left">
                    <div class="flex items-center justify-center lg:justify-start text-slate-500"> <i data-lucide="mail"
                            class="w-3 h-3 mr-2"></i> {{ $item->email }} </div>
                    <div class="flex items-center justify-center mt-1 lg:justify-start text-slate-500"> <i
                            data-lucide="phone" class="w-3 h-3 mr-2"></i> {{ $item->phone }} </div>
                </div>
                <div class="p-5 text-center border-t lg:text-right border-slate-200/60 dark:border-darkmode-400">
                    <a href="" class="px-2 py-1 btn btn-primary">{{ __('messages.web.common.detail') }}</a>
                </div>
            </div>
        </div>
    @endforeach
@else
    <div class="col-span-12 text-center intro-y text-slate-500">{{ __('messages.web.common.null') }}</div>
@endif
