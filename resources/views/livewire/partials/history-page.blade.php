<!-- Livewire Component - partials/history-page.blade.php -->
<div class="tajawal-regular flex-grow">
    <div class="m-6 ">
        @foreach ($history as $item)
        <div>
            <div class="tajawal-regular md:space-y-16 space-y-9 mt-2 p-4 md:p-7 py-[20%] md:py-[20%] rounded-lg " style=" background-image: url('images/OpenDay3.jpg'); background-size: cover; background-position:
                center; background-repeat: no-repeat;">
                <h1 dir="auto" id="news-title"
                    class="font-bold text-2xl md:text-6xl text-white text-center text-nowrap">
                    {{$item->title}}
                </h1>
                <h4 dir="auto" id="news-subtitle" class="text-white font-bold md:text-2xl text-center">
                    {{$item->subtitle}}
                </h4>
                </divclass=>
            </div>
            <div class="md:flex flex-col md:flex-row-reverse md:justify-between mt-6 relative ">
                <div class="prose  mt-3 md:overflow-y-auto md:pr-8 md:max-w-70vw text-2xl md:text-3xl">
                    <div dir="auto" id="news-content" class="custom-scrollbar select-none ">
                        {!! \Illuminate\Support\Str::markdown($item->content) !!}
                        <button id="scroll-to-top"
                            class=" hover:bg-emerald-400 fixed bottom-10 right-10 bg-green-600 text-white px-3 py-1 rounded-full hidden ">
                            ↑
                        </button>
                    </div>

                </div>
                <div class=" md:h-screen overflow-auto  sticky top-0 bg-gray-50">
                    <aside class="px-4 mt-12 md:mt-0" dir="rtl">
                        <div class="">
                            <h2 class="text-3xl   mb-4 text-right">أخبار إضافية</h2>
                            <div class="flex flex-col gap-3  mt-5">
                                @if(isset($featuredNews) && is_iterable($featuredNews))
                                @foreach($featuredNews as $additional)
                                <div class="border-t-2 border-b-2 p-4">
                                    <h3 id="additional-news" class="text-xl font-bold mb-2">{{ $additional->title }}
                                    </h3>
                                    <p>{{ \Carbon\Carbon::parse($additional->created_at)->format('Y-m-d') }}</p>

                                    <div dir="auto">
                                        <a id="read-more" href="/news/{{ $additional->id }}"
                                            class="text-green-600 font-bold hover:underline">اقرأ المزيد</a>
                                    </div>
                                </div>
                                @endforeach
                                @else
                                <div class="bg-gray-100 rounded-lg p-4">
                                    <h3 id="additional-news" class="text-xl font-bold mb-2">No additional news available
                                    </h3>
                                </div>
                                @endif
                            </div>

                        </div>
                    </aside>
                </div>
            </div>
            @endforeach

        </div>

        <style>
        .custom-scrollbar {
            scrollbar-width: thin;
            scrollbar-color: #4a5568 transparent;
            overflow-y: auto;
        }

        .custom-scrollbar::-webkit-scrollbar {
            width: 8px;
        }

        .custom-scrollbar::-webkit-scrollbar-track {
            background: transparent;
        }

        .custom-scrollbar::-webkit-scrollbar-thumb {
            background-color: #4a5568;
            border-radius: 4px;
        }
        </style>

        <script>
        document.addEventListener("DOMContentLoaded", function() {

            const scrollToTopButton = document.getElementById('scroll-to-top');

            window.addEventListener('scroll', function() {
                if (window.scrollY > 200) {
                    scrollToTopButton.classList.remove('hidden');
                } else {
                    scrollToTopButton.classList.add('hidden');
                }
            });

            scrollToTopButton.addEventListener('click', function() {
                window.scrollTo({
                    top: 0,
                    behavior: 'smooth'
                });
            });
        });
        </script>
    </div>