<div class="m-6 tajawal-regular" id="main-div">
    <div class="row">
        <div>
            <div id="custom-controls-gallery" class="relative mx-[10%]  rounded-lg" data-carousel="slide">
                <!-- Carousel wrapper -->
                <div class="relative h-56 overflow-hidden rounded-lg lg:h-96">
                    <!-- Carousel items -->
                    @foreach($news->images as $image)
                    <div class="hidden duration-700 ease-in-out " data-carousel-item>
                        @if($news->images)
                        <div class="mt-2 flex flex-wrap">
                            <img src="{{ asset('storage/' . $image) }}" alt="{{ $news->title }}"
                                class="absolute block max-w-full max-h-full h-auto -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2">
                        </div>
                        @elseif (!(isset($news->images)))
                        <div class="mt-2 flex flex-wrap">
                            <p>no image</p>
                        </div>
                        @endif
                    </div>
                    @endforeach
                </div>

                <!-- Carousel controls -->
                <div class="flex justify-center items-center p-2 ">
                    <button type="button"
                        class="flex justify-center items-center me-4 h-full cursor-pointer group focus:outline-none"
                        data-carousel-prev>
                        <span
                            class="text-gray-400 hover:text-gray-900 dark:hover:text-white group-focus:text-gray-900 dark:group-focus:text-white">
                            <svg class="rtl:rotate-180 w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 14 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="M13 5H1m0 0 4 4M1 5l4-4" />
                            </svg>
                            <span class="sr-only">Previous</span>
                        </span>
                    </button>
                    <button type="button"
                        class="flex justify-center items-center h-full cursor-pointer group focus:outline-none"
                        data-carousel-next>
                        <span
                            class="text-gray-400 hover:text-gray-900 dark:hover:text-white group-focus:text-gray-900 dark:group-focus:text-white">
                            <svg class="rtl:rotate-180 w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 14 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                            </svg>
                            <span class="sr-only">Next</span>
                        </span>
                    </button>
                </div>
            </div>
        </div>

        <div class="flex flex-col  justify-center items-center mt-6 relative">

            <div class=" mt-3 text-right  text-2xl lg:text-3xl">
                <h1 class="text-3xl font-serif text-green-900 text-center mt-9" id="news-title">{{ $news->title }}</h1>

                <div id="news-content" class="prose mt-9 lg:text-2xl m-4">
                    {!! \Illuminate\Support\Str::markdown($news->content) !!}
                </div>
            </div>
            <div class=" h-screen overflow-auto  mt-16 ">
                <aside class="px-4 overflow-auto lg:mt-0" dir="rtl">
                    <h2 class="text-3xl font-bold  mb-4 text-right">أخبار إضافية</h2>

                    <div class="">
                        <div class="flex flex-col gap-3  mt-5">
                            @if(isset($featuredNews) && is_iterable($featuredNews))
                            @foreach($featuredNews as $additional)
                            <div class="border-t-2 border-b-2 p-4">
                                <h3 id="additional-news" class="text-xl font-bold mb-2">{{ $additional->title }}</h3>
                                <p>{{ \Carbon\Carbon::parse($additional->created_at)->format('Y-m-d') }}</p>

                                <div dir="rtl">
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

        <!-- Scroll to Top Button -->
        <button id="scroll-to-top"
            class=" hover:bg-emerald-400 fixed bottom-10 right-10 bg-green-600 text-white px-3 py-1 rounded-full hidden ">
            ↑
        </button>
    </div>

    <script>
    function isArabic(text) {
        const arabicPattern = /[\u0600-\u06FF]/;
        return arabicPattern.test(text);
    }

    document.addEventListener("DOMContentLoaded", function() {
        const newsTitle = document.getElementById('news-title');
        const newsContent = document.getElementById('news-content');
        const additionalNews = document.querySelectorAll('#additional-news');
        const readMore = document.querySelectorAll('#read-more');

        if (isArabic(newsTitle.innerText)) {
            newsTitle.setAttribute('dir', 'rtl');
        } else {
            newsTitle.setAttribute('dir', 'ltr');
        }

        if (isArabic(newsContent.innerText)) {
            newsContent.setAttribute('dir', 'rtl');
        } else {
            newsContent.setAttribute('dir', 'ltr');
        }

        additionalNews.forEach(news => {
            if (isArabic(news.innerText)) {
                news.setAttribute('dir', 'rtl');
            } else {
                news.setAttribute('dir', 'ltr');
            }
        });

        readMore.forEach(link => {
            if (isArabic(link.innerText)) {
                link.setAttribute('dir', 'rtl');
            } else {
                link.setAttribute('dir', 'ltr');
            }
        });

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