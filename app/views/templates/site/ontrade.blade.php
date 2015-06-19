<?
/**
 * TITLE: Карта заведений
 * AVAILABLE_ONLY_IN_ADVANCED_MODE
 */
?>
@extends(Helper::layout())
<?
$institutions = [];
?>


@section('style')
@stop


@section('content')

    <div class="main-content institutions-map">
        <div class="content">
            <div class="institution-page-head"><span>
                    {{ nl2br($page->field('slogan')) }}
                </span>
            </div>
            <span class="title-red">{{ $page->name }}</span>
            <ul class="breadcrumbs">
                <li><a href="#">Главная</a></li>
                <li><span>{{ $page->name }}</span></li>
            </ul>
            <div class="institutions-filter">
                <form name="filter" id="institutions-filter">
                    <label for="city">Город: </label>
                    <select id="city" for="filter" name="city" class="js-filter-select"></select>
                    <label for="cuisine">Кухня: </label>
                    <select id="cuisine" for="filter" name="cuisine" class="js-filter-select"></select>
                    <label for="type">Тип заведения:</label>
                    <select id="type" for="filter" name="type" class="js-filter-select"></select>
                </form>
            </div>
            <div class="column-left">
                <div class="institutions-list">
                    <ul class="institutions"></ul>
                </div>
            </div>
            <div class="column-right">
                <div id="google-map">
                    <script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyA4Q5VgK-858jgeSbJKHbclop_XIJs3lXs&amp;sensor=true"></script>
                </div>
            </div>
            <div class="text">

                @if (count($page->blocks))
                    @foreach ($page->blocks as $block)
                        {{ $page->block($block->slug) }}
                    @endforeach
                @endif

            </div>
            <script>
                var institutions = [
                    {
                        'id':'01',
                        'city': 'test-sity 1',
                        'name': 'test 1',
                        'type': 'test-type 1',
                        'cuisine': 'test-cuisine-1',
                        'lat': '55.753927',
                        'lng': '37.620819',
                        'adress' : 'test test test test'

                    },
                    {
                        'id':'02',
                        'city': 'test-sity 2',
                        'name': 'test 2',
                        'type': 'test-type 2',
                        'cuisine': 'test-cuisine-2',
                        'lat': '55.754639',
                        'lng': '37.619131',
                        'adress' : 'test test test test'
                    },
                    {
                        'id':'03',
                        'city': 'test-sity 3',
                        'name': 'test 3',
                        'type': 'test-type 3',
                        'cuisine': 'test-cuisine-3',
                        'lat': '55.753616',
                        'lng': '37.616355',
                        'adress' : 'test test test test'
                    }
                ]
            </script>
        </div>
    </div>

@stop


@section('scripts')
@stop