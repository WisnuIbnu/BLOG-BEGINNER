
         <header class="py-5 bg-light border-bottom mb-4">
            <div class="container">
                <div class="text-center my-5">

                    @if (empty($article->category->name))
                        <h1 class="fw-bolder display-4 text-sm-center">🌟UAP BLOG🌟</h1>
                        <h2 class="card-title text-muted mt-3">Nikmati pengalaman membaca yang tak terlupakan bersama kami 📚</h2>
                        <p class="text-secondary mt-4">
                            Jelajahi dunia informasi, inspirasi, dan edukasi dengan konten berkualitas yang kami sediakan. 
                            Mari temukan wawasan baru setiap harinya!
                    </p>
                    @else
                        <h1 class="fw-bolder">{{ ($article->title) }}</h1>
                        <h2 class="card-title">{{ ($article->category->name) }}</h2>
                    @endif

                </div>
            </div>
        </header>