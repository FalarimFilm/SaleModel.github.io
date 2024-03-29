@extends('layouts.main')

@section('title', $title)

@section('content')
    <main>
        <form action="{{ route('product-add-shop', ['product' => $product->code]) }}" method="get">
            <label>
                Search
                <input type="text" name="term" value="{{ $search['term'] }}" />
            </label>

            <a href="{{ route('product-view-shop', ['product' => $product->code]) }}">
                <button type="button" class="accent">Clear</button>
            </a>
        </form>

        <br /><br />

        <div>{{ $shops->withQueryString()->links() }}</div>
        <nav>
            <ul>
                <li><a href="{{ route('product-view-shop', [
                    'product' => $product->code,
                    ]) }}">&lt; Back</a></li>
            </ul>
            </nav>
        <form action="{{ route('product-add-shop', [
            'product' => $product->code,
        ]) }}"
            method="post">
            @csrf
            <table>
                <thead>
                    <tr>
                        <th>Code</th>
                        <th>Name</th>
                        <th>Owner</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($shops as $shop)
                        <tr>
                            <th class="code">{{ $shop->code }}</th>
                            <td><em>{{ $shop->name }}</em></td>
                            <td>{{ $shop->owner }}</td>
                            <td>
                                <button type="submit" name="shop" value="{{ $shop->code }}">Add</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </form>
        <br />
        <br />
    </main>
    <nav>
        <ul>

            <li><a href="{{ route('product-view-shop', ['product' => $product->code]) }}">&lt; Back</a></li>
        </ul>
    </nav>
@endsection
