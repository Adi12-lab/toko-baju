@extends('layouts.app')
@section('main')
    <section>
        <div class="auto-container py-4">
            <div class="row">
                <div class="col-12">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Info</th>
                                <th scope="col">Subjek</th>
                                <th scope="col">Pesan</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($messages as $message)
                            <tr>
                                <td>
                                    <span>Nama : {{$message->name}}</span>
                                    <br>
                                    <span>Phone : {{$message->phone}}</span>
                                    <br>
                                    <span>Email : {{$message->email}}</span>
                                    <br>
                                    <span>{{lastUpdate($message->created_at)}}</span>
                                </td>
                                <td>{{$message->subject}}</td>
                                <td>
                                    <p>
                                        {{$message->message}}
                                    </p>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="col">
                    {{$messages->links()}}
                </div>
            </div>
        </div>
    </section>
@endsection
