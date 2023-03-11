@component('mail::message')
# 新しいユーザが追加されました。
@component('mail::panel')
{{$toUser->name}}さんこんにちは！新しく{{$newUser->name}}さんが参加しましたよ！

@endcomponent

@component('mail::button',['url'=>route('tweet.index')])
つぶやきを見に行く
@endcomponent
@endcomponent
