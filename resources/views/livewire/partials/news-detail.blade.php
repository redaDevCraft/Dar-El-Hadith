<div class="m-6 " id="main-div">
    <div class="row">
        <div>
            <div id="custom-controls-gallery" class="relative mx-[10%] border-2 rounded-md" data-carousel="slide">
                <!-- Carousel wrapper -->
                <div class="relative h-56 overflow-hidden rounded-lg md:h-96">
                    <!-- Carousel items -->
                    @foreach($news->images as $image)
                    <div class="hidden duration-700 ease-in-out bg-gradient-to-t from-green-900  to-green-100"
                        data-carousel-item>
                        @if($news->images)
                        <div class="mt-2 flex flex-wrap">
                            <img src="{{ asset('storage/' . $image) }}" alt="{{ $news->title }}"
                                class="absolute block max-w-full max-h-full h-auto -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2">
                        </div>
                        @elseif (!(isset($news->images)))


                        <div class="mt-2 flex flex-wrap">
                            <p>no image</p>
                            <script>
                            public

                            function render() {
                                console.log('No image found');
                            }
                            </script>
                        </div>
                        @endif

                    </div>
                    @endforeach
                </div>

                <!-- Carousel controls -->
                <div class="flex justify-center items-center pt-4 bg-gray-200">
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
        <div id="news-content" class="col-md-12 ">
            <h1 class="text-3xl font-bold text-center mt-9" id="news-title">{{ $news->title }}</h1>
            <div class="prose md:prose-p:w-[232%] md:prose-p:text-justify md:prose-headings:w-[230%] mt-9 ">
                {!! \Illuminate\Support\Str::markdown($news->content) !!}
            </div>
        </div>
    </div>

    <!-- Additional News Section -->
    <div class="container mx-auto my-12 px-4">
        <h2 class="text-2xl font-bold mb-4 text-right">أخبار إضافية</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @foreach($additionalNews as $additional)
            <div class="bg-gray-100 rounded-lg p-4">
                <h3 id="additional-news" class="text-xl font-bold mb-2">{{ $additional->title }}</h3>
                <div dir="rtl">
                    <a id="read-more" href="/news/{{ $additional->id }}"
                        class="text-green-600 font-bold hover:underline">اقرأ
                        المزيد</a>
                </div>

            </div>
            @endforeach
        </div>
    </div>

</div>

<script>
function isArabic(text) {
    const arabicPattern = /[\u0600-\u06FF]/;
    return arabicPattern.test(text);
}

document.addEventListener("DOMContentLoaded", function() {
    const newsTitle = document.getElementById('news-title');
    const newsContent = document.getElementById('news-content');
    const mainDiv = document.getElementById('main-div');
    const additionalNews = document.getElementById('additional-news');
    const readMore = document.getElementById('read-more');

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

    if (isArabic(additionalNews.innerText)) {
        additionalNews.setAttribute('dir', 'rtl');
    } else {
        additionalNews.setAttribute('dir', 'ltr');
    }

});
</script>