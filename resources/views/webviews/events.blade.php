@include('webviews/header')
<section class="privacy section pt-0">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <form action="events" method="get" id="eventFilterForm">
                    @csrf
                    <nav class="privacy-nav">
                        <ul>
                            <li><a class="nav-link scrollTo" href="#userLicense" class="scrollTo">Filters</a></li>
                        </ul>
                    </nav>
                    {{-- <div class="filter-category tn-entity-filter-category">
                    <h5>Language</h5>
                    <ul id="ulLanguageFilter" class="category-filters">
                        <li><label class="tn-checkbox-container"><input type="checkbox" name="language_filter" value="HINDI"> <span class="tn-checkbox"></span> <span class="tn-label">HINDI</span></label></li>
                        <li><label class="tn-checkbox-container"><input type="checkbox" name="language_filter" value="ENGLISH"> <span class="tn-checkbox"></span> <span
                                    class="tn-label">ENGLISH</span></label></li>
                        <li><label class="tn-checkbox-container"><input type="checkbox" name="language_filter"
                                    value="ENGLISHMX4D"> <span class="tn-checkbox"></span> <span
                                    class="tn-label">ENGLISHMX4D</span></label></li>
                    </ul>
                </div>--}}
                    <div class="filter-category tn-entity-filter-category">
                        <h5>Categories</h5>

                        <ul id="ulLanguageFilter" class="category-filters">
                            @foreach ($categories as $category)
                                <li><label class="tn-checkbox-container"><input {{isset($_GET['categories_filter']) && in_array($category->id,$_GET['categories_filter'])?'checked':''}}
                                            onclick="filterEvents()" type="checkbox" name="categories_filter[]"
                                            value="{{ $category->id }}"> <span class="tn-checkbox"></span>
                                        <span class="tn-label">{{ Str::upper($category->category_name) }}</span>
                                    </label>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </form>
                {{--<div class="filter-category tn-entity-filter-category">
                    <h5>Day</h5>
                    <ul id="ulLanguageFilter" class="category-filters">
                        <li><label class="tn-checkbox-container"><input type="checkbox" name="language_filter"
                                    value="HINDI"> <span class="tn-checkbox"></span> <span
                                    class="tn-label">MONDAY</span></label></li>
                        <li><label class="tn-checkbox-container"><input type="checkbox" name="language_filter"
                                    value="ENGLISH"> <span class="tn-checkbox"></span> <span
                                    class="tn-label">TUESDAY</span></label></li>
                        <li><label class="tn-checkbox-container"><input type="checkbox" name="language_filter"
                                    value="ENGLISHMX4D"> <span class="tn-checkbox"></span> <span
                                    class="tn-label">WEDNESDAY</span></label></li>
                        <li><label class="tn-checkbox-container"><input type="checkbox" name="language_filter"
                                    value="MARATHI"> <span class="tn-checkbox"></span> <span
                                    class="tn-label">THURSDAY</span></label></li>
                        <li><label class="tn-checkbox-container"><input type="checkbox" name="language_filter"
                                    value="MALAYALAM"> <span class="tn-checkbox"></span> <span
                                    class="tn-label">FRIDAY</span></label></li>
                        <li><label class="tn-checkbox-container"><input type="checkbox" name="language_filter"
                                    value="TELUGU"> <span class="tn-checkbox"></span> <span
                                    class="tn-label">SATURDAY</span></label></li>
                        <li><label class="tn-checkbox-container"><input type="checkbox" name="language_filter"
                                    value="KANNADA"> <span class="tn-checkbox"></span> <span
                                    class="tn-label">SUNDAY</span></label></li>
                    </ul>
                </div> --}}

                {{-- <div class="filter-category tn-entity-filter-category">
                    <h5>City</h5>
                    <ul id="ulLanguageFilter" class="category-filters">
                        <li><label class="tn-checkbox-container"><input type="checkbox" name="language_filter"
                                    value="HINDI"> <span class="tn-checkbox"></span> <span
                                    class="tn-label">Bronx</span></label></li>
                        <li><label class="tn-checkbox-container"><input type="checkbox" name="language_filter"
                                    value="ENGLISH"> <span class="tn-checkbox"></span> <span
                                    class="tn-label">Brooklyn</span></label></li>
                        <li><label class="tn-checkbox-container"><input type="checkbox" name="language_filter"
                                    value="ENGLISHMX4D"> <span class="tn-checkbox"></span> <span
                                    class="tn-label">Manhattan</span></label></li>
                        <li><label class="tn-checkbox-container"><input type="checkbox" name="language_filter"
                                    value="MARATHI"> <span class="tn-checkbox"></span> <span class="tn-label">Staten
                                    Island</span></label></li>
                    </ul>
                </div> --}}

                {{-- <div class="filter-category tn-entity-filter-category">
                    <h5>Price</h5>
                    <ul id="ulLanguageFilter" class="category-filters">
                        <li><label class="tn-checkbox-container"><input type="checkbox" name="language_filter"
                                    value="HINDI"> <span class="tn-checkbox"></span> <span class="tn-label">$0 -
                                    500</span></label></li>
                        <li><label class="tn-checkbox-container"><input type="checkbox" name="language_filter"
                                    value="ENGLISH"> <span class="tn-checkbox"></span> <span class="tn-label">$501 -
                                    1000</span></label></li>
                        <li><label class="tn-checkbox-container"><input type="checkbox" name="language_filter"
                                    value="ENGLISHMX4D"> <span class="tn-checkbox"></span> <span
                                    class="tn-label">$1001 - 2000</span></label></li>
                        <li><label class="tn-checkbox-container"><input type="checkbox" name="language_filter"
                                    value="MARATHI"> <span class="tn-checkbox"></span> <span class="tn-label">$2001 -
                                    5000</span></label></li>
                    </ul>
                </div> --}}

            </div>
            <div class="col-lg-9">
                <nav class="privacy-nav">
                    <ul>
                        <li><a class="nav-link scrollTo" href="#userLicense" class="scrollTo">Events</a>
                        </li>
                    </ul>
                </nav>
                <div class="block">
                    @foreach ($events as $event)
                        <div class="event-sect">
                            <!-- Post -->
                            <article class="post-sm">
                                <!-- Post Image -->
                                <div class="post-thumb">
                                    <a href="event-details/{{ $event->slug }}/{{ $event->id }}"><img class="w-100" src="{{ asset('uploads/' . $event->image) }}" alt="Post-Image"></a>
                                </div>
                                <!-- Post Title -->
                                <div class="post-title">
                                    <h3><a href="#">{{ $event->title }}</a></h3>
                                </div>
                                <p class="post-date">{{ date('D, F d', strtotime($event->start_datetime)) }}</p>
                                <div class="post-details">
                                    <p>{{ $event->location }}<br />
                                        Free</p>
                                </div>
                            </article>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

{{-- $events->onEachSide(2)->links() --}}

{{-- {{ $events->links() }} --}}

{{-- $events->onEachSide(2)->appends(request()->all())->links('pagination::event_pagination') --}}

<!--====  End of Privacy Policy  ====-->
{{-- <section class="privacy section pt-0">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">

                <div class="center">
                    <div class="pagination">
                        <a href="#">&laquo;</a>
                        <a href="#">1</a>
                        <a href="#" class="active">2</a>
                        <a href="#">3</a>
                        <a href="#">4</a>
                        <a href="#">5</a>
                        <a href="#">6</a>
                        <a href="#">&raquo;</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> --}}

<script>
    function filterEvents() {
        document.getElementById("eventFilterForm").submit();
    }
</script>

@include('webviews/footer')
