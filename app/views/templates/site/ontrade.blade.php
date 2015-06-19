<?
/**
 * TITLE: Карта заведений
 * AVAILABLE_ONLY_IN_ADVANCED_MODE
 */
?>
@extends(Helper::layout())
<?
$institutions = Dic::valuesBySlug('ontrade', null, ['fields', 'textfields'], true, true, true);
#Helper::tad($institutions);
$temp = [];
$city = [];
$cuisine = [];
$type = [];
if (isset($institutions) && count($institutions)) {
    foreach ($institutions as $place) {
        $temp[] = [
            'id' => $place->id,
            'city' => $place->city,
            'name' => $place->name,
            'type' => $place->type,
            'cuisine' => $place->cuisine,
            'lat' => $place->lat,
            'lng' => $place->lng,
            'address' => $place->address,
            'operation_time' => $place->operation_time,
            'phone' => $place->phone,
            'site' => $place->site,
            'description' => $place->description,
        ];
    }

    $city = Dic::valuesBySlug('ontrade_city', null, []);
    $city = $city->lists('name', 'id');
    #Helper::tad($city);

    $cuisine = Dic::valuesBySlug('ontrade_cuisine', null, []);
    $cuisine = $cuisine->lists('name', 'id');
    #Helper::tad($cuisine);

    $type = Dic::valuesBySlug('ontrade_types', null, []);
    $type = $type->lists('name', 'id');
    #Helper::tad($type);
}
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
                var institutions = {{ json_encode($temp, JSON_UNESCAPED_UNICODE) }};
                var city = {{ json_encode($city, JSON_UNESCAPED_UNICODE) }};
                var cuisine = {{ json_encode($cuisine, JSON_UNESCAPED_UNICODE) }};
                var type = {{ json_encode($type, JSON_UNESCAPED_UNICODE) }};
            </script>
        </div>
    </div>

@stop


@section('scripts')
@stop