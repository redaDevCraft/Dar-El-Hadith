@section('meta')
<meta property="og:type" content="article">
<meta property="og:title" content="{{ isset($news->title) ? $news->title : 'عنوان غير متوفر' }}">

<meta property="og:url" content="{{ url()->current() }}">
<meta property="og:site_name" content="دار الحديث">
<meta property="og:locale" content="ar_DZ">
@if($news->images && is_array($news->images) && count($news->images) > 0)
<meta property="og:image" content="{{ asset('storage/' . $news->images[0]) }}">
<meta property="og:image:width" content="1200">
<meta property="og:image:height" content="630">
<meta property="og:image:alt" content="{{ $news->title }}">
@else
<meta property="og:image" content="{{ asset('images/SmallWhiteLogo.svg') }}">
@endif

<!-- Twitter Card -->
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="{{ $news->title }}">
@if($news->images && is_array($news->images) && count($news->images) > 0)
<meta name="twitter:image" content="{{ asset('storage/' . $news->images[0]) }}">
@else
<meta name="twitter:image" content="{{ asset('images/SmallWhiteLogo.svg') }}">
@endif


<!-- Article specific -->
<meta property="article:published_time" content="{{ $news->created_at->toISOString() }}">
<meta property="article:modified_time" content="{{ $news->updated_at->toISOString() }}">
<meta property="article:section" content="أخبار">

<!-- Additional SEO -->
<meta name="description" content="{{ Str::limit(strip_tags($news->content), 160) }}">
<meta name="keywords" content="دار الحديث, أخبار, {{ $news->title }}">
<link rel="canonical" href="{{ url()->current() }}">
@endsection

<div class="m-6 tajawal-regular" id="main-div">
    <div class="row">


        <!-- Article Header -->
        <div class="max-w-4xl mx-auto mt-8 px-4">
            <!-- Article Title -->
            <h1 class="text-4xl lg:text-5xl font-bold text-green-900 text-center mb-6" id="news-title">
                {{ $news->title }}

            </h1>

            <!-- Article Meta Info -->
            <div class="flex justify-center items-center gap-4 mb-8 text-gray-600">
                <span>{{ \Carbon\Carbon::parse($news->created_at)->format('Y-m-d') }}</span>
                <span>•</span>
                <span>عدد المشاهدات: {{ $news->views ?? 0 }}</span>


            </div>

            <!-- Featured Image -->
            @if($news->images && is_array($news->images) && count($news->images) > 0)
            <div class="mb-8">
                <img src="{{ asset('storage/' . $news->images[0]) }}" alt="{{ $news->title }}"
                    class="w-full h-64 lg:h-96 object-cover rounded-lg shadow-lg">
            </div>
            @endif
        </div>

        <!-- Article Content -->
        <div class="max-w-4xl mx-auto px-4">
            <div id="news-content" class="prose prose-lg lg:prose-xl max-w-none text-right" dir="auto">
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
                                <a id="read-more" href="#" wire:click.prevent="incrementViews({{ $additional->id }})"
                                    class="text-green-600 font-bold hover:underline">اقرأ
                                    المزيد</a>
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