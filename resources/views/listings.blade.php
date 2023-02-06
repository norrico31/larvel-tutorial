<!-- initialize variables in php -->
@php
$name='norrico'
@endphp
{{$name}}

<!-- @if(count($listings) == 0)
<p>No listings found</p>
@endif -->


@unless(count($listings) == 0)

<h1>{{$heading}}</h1>
@foreach ($listings as $listing)
<h2><a href="/listing/{{$listing['id']}}">{{$listing['title']}}</a></h2>
<p><?php echo $listing['description']; ?></p>
@endforeach

@else
<p>No Listings found!</p>

@endunless