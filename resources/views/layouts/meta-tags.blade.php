<!-- Global site tag (gtag.js) - Google Analytics -->
{{-- <script async src="https://www.googletagmanager.com/gtag/js?id={{ setting('site.google_analytics_tracking_id', '0000') }}"></script>
<script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());
    gtag('config', '{{ setting('site.google_analytics_tracking_id', '0000') }}');
</script> --}}
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="robots" content="none" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
<meta name="description" content="{{ setting('site.title') }} - {{ setting('site.description') }}">

<!– para o sistema Open Graph –>
<meta property="og:title" content="{{ setting('site.title') }}" />
<meta property="og:type" content="website" />
<meta property="og:url" content="{{ Request::url() }}" />
<meta property="og:image" content="{{ Voyager::image(setting('site.logo')) }}" />
<meta property="og:description" content="{{ setting('site.description') }}" />
<meta property="og:site_name" content="{{ setting('site.title') }}" />