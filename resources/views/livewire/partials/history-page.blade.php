<div dir="rtl" class="">
    @foreach ($history as $item)
    <div>
        <div class="md:space-y-16 space-y-9  mt-2 p-4 md:p-7 md:py-[20%] "
            style="background-image: url('images/nabda.svg'); background-size:cover ; background-position:center; background-repeat: no-repeat;">
            <h1 id="news-title" class="font-bold text-2xl md:text-6xl text-white text-center text-nowrap">
                {{$item->title}}
            </h1>
            <h4 id="news-subtitle" class="text-white  text-2xl text-center">
                {{$item->subtitle}}
            </h4>
        </div>
    </div>
    <div id="news-content"
        class="prose md:prose-p:w-[232%] m-2  md:prose-p:text-center md:prose-headings:w-[230%] mt-3  ">

        <div id="news-content">
            {!! \Illuminate\Support\Str::markdown($item->content) !!}
        </div>
    </div>
    @endforeach
</div>

<script>
function isArabic(text) {
    const arabicPattern = /[\u0600-\u06FF]/;
    return arabicPattern.test(text);
}

document.addEventListener("DOMContentLoaded", function() {
    const newsTitle = document.getElementById('news-title');
    const newsSubtitle = document.getElementById('news-subtitle');
    const newsContent = document.getElementById('news-content');

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

    if (isArabic(newsSubtitle.innerText)) {
        newsSubtitle.setAttribute('dir', 'rtl');
    } else {
        newsSubtitle.setAttribute('dir', 'ltr');
    }

});
</script>