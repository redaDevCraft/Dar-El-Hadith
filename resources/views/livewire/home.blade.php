<div class="relative">

    <!-- Hero Section -->
    <div class="flex flex-col justify-center items-center md:space-y-16 space-y-9 mt-2 md:m-10 m-6 rounded-lg md:py-[20%] h-60 bg-cover bg-center bg-no-repeat"
        style="background-image: url('images/OpenDay3.jpg');">
        <h3 class="font-bold text-2xl md:text-6xl text-white text-center">
            دار الحديث بتلمسان..مهد العلماء و معقل الشهداء
        </h3>
        <button class="bg-green-700 text-white  hover:bg-white hover:text-emerald-900 border-2  text-nowrap font-bold p-2 md:p-3 rounded-lg  md:text-2xl  max-md:1/2  md:w-auto 
             duration-500">
            <a href="/history"> تعرف على دار الحديث

            </a>
        </button>
    </div>

    <h2 class="text-center bg-gray-200 rounded-md m-6 p-4 font-bold text-3xl font-serif text-green-900"> أخبار دار
        الحديث</h2>



    <!-- Carousel -->
    <div class="flex flex-col md:m-10 m-6 ">
        <div id="default-carousel" class="relative  w-full " data-carousel="slide">

            <!-- Carousel wrapper -->
            <div class="relative  overflow-hidden rounded-lg h-screen border-2">
                @foreach ($news as $item)
                <div id="carousel-wrapper"
                    class=" flex flex-col justify-between items-center content-center bg-green-500  {{ !empty($item->images) ? 'absolute  w-full h-full  hidden duration-1000 ease-in-out' : ' hidden    duration-1000 ease-in-out' }}"
                    data-carousel-item style="background-image: url('{{ !empty($item->images) ? asset('storage/' . $item->images[0]) : asset('images/LargeLogo.svg') }}'); 
                        background-repeat: no-repeat;
                        background-size: {{ !empty($item->images) ? 'contain' : 'auto' }}; 
                        background-position: center;
                        ">

                    <div></div>
                    <div
                        class="flex flex-row md:flex-col md:justify-center justify-between items-center content-start space-x-7 md:space-x-0  md:space-y-2  md:items-center bg-green-900  w-full p-2 md:p-1 text-white ">
                        <div id="news-title" class="opacity-85 font-bold font-sans"> {{$item->title}}</div>
                        <div
                            class="bg-white text-green-800 contrast-12 font-bold text-nowrap rounded-md p-2 md:p-1 hover:bg-green-400 duration-500 ">
                            <a href="/news/{{ $item->id }}">
                                عرض الحدث
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>

            <!-- Slider Controls -->
            <button type="button"
                class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                data-carousel-prev>
                <span
                    class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-green-800 dark:bg-gray-800/30 group-hover:bg-green-600 duration-200 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                    <svg class="w-4 h-4 text-gray-300 dark:text-gray-800 rtl:rotate-180" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M5 1 1 5l4 4" />
                    </svg>
                    <span class="sr-only">Previous</span>
                </span>
            </button>
            <button type="button"
                class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                data-carousel-next>
                <span
                    class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-green-800 dark:bg-gray-800/30 group-hover:bg-green-600 duration-200 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                    <svg class="w-4 h-4 text-gray-300 dark:text-gray-800 rtl:rotate-180" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 9 4-4-4-4" />
                    </svg>
                    <span class="sr-only">Next</span>
                </span>
            </button>
        </div>
    </div>


    <!-- <div class="bg-gray-400 flex flex-row rounded-md border-2 border-green-800 m-6 ">
        <img src="images/ibrahimi.svg" class="m-4">
        <div class="flex flex-col justify-center items-end ">
            <div class=" font-bold">الشيخ البشير الإبراهيمي</div>
            <div class=" ">محمد البشير الإبراهيمي (1889-1965 م)الموافق (1306 هـ -1385 هـ) من أعلام الفكر
                والأدب
                في العالم العربي، ومن العلماء في الجزائر. هو رفيق النضال للشيخ عبد الحميد ابن باديس في قيادة الحركة
                الإصلاحية الجزائرية، ونائبه، ثم خليفته في رئاسة جمعية العلماء المسلمين.</div>
            <div>
                <a href="#" class="bg-green-900 font-bold text-white text-center p-2 rounded-md">تعرف عليه
                    أكثر</a>
            </div>
        </div>
    </div> -->

    <!-- <h2 class="text-center bg-gray-200 rounded-md m-6 p-4 font-bold text-3xl font-serif text-green-900">
        مؤسس دار الحديث</h2>

    <div class="bg-gray-100 flex flex-col justify-center md:flex-row rounded-md border-2 border-green-800 md:m-10 m-6">
        <img src="images/ibrahimi.svg" class="m-4 md:h-96">
        <div dir="rtl" class="flex flex-col justify-center md:justify-evenly space-y-6  font-serif m-6">
            <div class=" font-bold text-2xl text-green-900 md:text-5xl">الشيخ البشير الإبراهيمي</div>
            <div class="md:text-4xl text-green-950 font-sans">محمد البشير الإبراهيمي (1889-1965 م)الموافق
                (1306 هـ -1385
                هـ) من
                أعلام الفكر
                والأدب
                في العالم العربي، ومن العلماء في الجزائر. هو رفيق النضال للشيخ عبد الحميد ابن باديس في قيادة الحركة
                الإصلاحية الجزائرية، ونائبه، ثم خليفته في رئاسة جمعية العلماء المسلمين.</div>

            <a href="#" class="bg-green-900 font-bold font-sans text-white text-nowrap p-2 text-center  rounded-md">تعرف
                عليه
                أكثر</a>
        </div>
    </div> -->

    <h2 id="marafiq"
        class="text-center overflow: auto bg-gray-200 rounded-md m-6 p-4 font-bold text-3xl font-serif text-green-900">
        مرافق دار
        الحديث</h2>

    <div
        class="bg-gray-100 flex flex-col-reverse justify-center md:flex-row rounded-md border-2 border-green-800 md:m-10 m-6">
        <div dir="rtl" class="flex flex-col justify-center md:justify- space-y-5 md:space-y-9 font-serif m-6">
            <div class="font-bold text-2xl text-green-950 md:text-4xl">المدرسة التحضيرية </div>
            <div class="md:text-4xl font-sans">
                تستقبل المدرسة الأطفال الصغار البالغين من العمر أربع سنوات، وخمس سنوات، وأكثر، ويمتاز البرنامج السنوي
                بالطابع الديني والتركيز على القرآن الكريم والحديث الشريف والآداب الإسلامية بالإضافة الى مواد الحساب و
                مادة المحادثة المستوحاة من واقع التلميذ الاجتماعي والأسري.

            </div>
        </div>
        <img src="images/OpenDay3.jpg" class=" p-4 h-96">
    </div>

    <div
        class="bg-gray-100 flex flex-col-reverse justify-center md:flex-row rounded-md border-2 border-green-800 md:m-10 m-6">
        <div dir="rtl" class="flex flex-col justify-center md:justify- space-y-5 md:space-y-9 font-serif m-6">
            <div class="font-bold text-2xl text-green-950 md:text-4xl">المصلى </div>
            <div class="md:text-4xl font-sans">
                يقع في الطابق الأرضي , تقام فيه الصلوات الخمس , صلاة الجمعة من طرف الشيخ بن يونس آيت سالم و صلاة
                التراويح في رمضان بالإضافة إلى العديد من الأنشطة مثل حلقات تلاوة القرآن الكريم و دروس خفيفة من طرف
                أساتذة وشيوخ لتزكية النفوس و هز القلوب

            </div>
        </div>
        <img src="images/OpenDay3.jpg" class=" p-4 h-96">
    </div>

    <div
        class="bg-gray-100 flex flex-col-reverse justify-center md:flex-row rounded-md border-2 border-green-800 md:m-10 m-6">
        <div dir="rtl" class="flex flex-col justify-center md:justify- space-y-5 md:space-y-3 font-serif m-6">
            <div class="font-bold text-2xl text-green-950 md:text-4xl">المكتبة </div>
            <div class="md:text-3xl font-sans">تقع في الطابق الأول، وتحتوي على حوالي خمسة آلاف كتاب في مجالات دينية
                متنوعة كالتفسير، الفقه، والعقيدة، بالإضافة إلى كتب الحركة الإصلاحية واللغة العربية. تضم المكتبة أيضًا
                مخطوطات قيمة مثل مخطوطة المصحف الشريف وصحيح البخاري. تحتوي المكتبة على قاعة للمطالعة، قاعة محاضرات و
                مكان للإعلام الآلي مزودة بالإنترنت. تقدم المكتبة دروس دعم ودورات تكوينية في الإعلام الآلي، وتفتح أبوابها
                يومياً من 9 صباحاً حتى 5 مساءا

            </div>
        </div>
        <img src="images/OpenDay3.jpg" class=" p-4 h-96">
    </div>

    <div
        class="bg-gray-100 flex flex-col-reverse justify-center md:flex-row rounded-md border-2 border-green-800 md:m-10 m-6">
        <div dir="rtl" class="flex flex-col justify-center md:justify- space-y-5 md:space-y-6 font-serif m-6">
            <div class="font-bold text-2xl text-green-950 md:text-4xl"> المدرسة القرآنية
            </div>
            <div class="md:text-2xl font-sans">
                تم افتتاح المدرسة القرآنية لدار الحديث بقاعة النساء بالطابق السفلي في مارس 1996 من قبل الجمعية الدينية
                والثقافية والعلمية. تطوع الشيخ محمد بوكلي حسن، حفيد الشيخ بوشناق، لتعليم القرآن فيها. يعمل محمد الآن
                محاسبًا، وشارك معه في التدريس عبد الحكيم مير والبشير مرابط وعبد الإله عراوي. تفتح المدرسة أبوابها بعد
                صلاة العصر حتى العشاء للعاملين، وفي أوقات أخرى لغير العاملين. تشهد المدرسة إقبالاً متزايداً من مختلف
                الأعمار، حتى أن القاعة تضيق أحياناً بهم. توفر الجمعية التدفئة والتكييف وتكرم الطلبة. تخرج العديد من
                الطلبة الذين يحفظون القرآن ويؤمون الناس في الصلوات بالمدينة.

            </div>
        </div>
        <img src="images/OpenDay3.jpg" class=" p-4 h-96">
    </div>

</div>






<script>
function isArabic(text) {
    const arabicPattern = /[\u0600-\u06FF]/;
    return arabicPattern.test(text);
}

document.addEventListener(" DOMContentLoaded", function() {
    const newsTitle = document.getElementById('news-title');
    const carouselWrapper = document.getElementById('carousel-wrapper');
    if (isArabic(newsTitle.innerText)) {
        newsTitle.setAttribute('dir', 'rtl');
        newsTitle.classList.add('text-right items-end');
        carouselWrapper.setAttribute('dir', 'rtl');
    } else {
        newsTitle.setAttribute('dir', 'ltr');
    }
});
</script>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const navbarLinks = document.querySelectorAll('a[href^="#"]');

    navbarLinks.forEach(link => {
        link.addEventListener('click', function(event) {
            event.preventDefault();

            const targetId = this.getAttribute('href');
            const targetElement = document.querySelector(targetId);

            if (targetElement) {
                targetElement.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });

                // Adjust scroll position to account for fixed navbar or offset
                setTimeout(() => {
                    const scrollY = window.scrollY;
                    window.scroll({
                        top: scrollY - 100,
                        behavior: 'smooth'
                    });
                }, 500); // Adjust delay as necessary
            }
        });
    });
});
</script>