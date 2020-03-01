@component('mail::message')
#お問い合わせありがとうこざいます

<strong>名前</strong> {{$data['name']}}
<strong>メールアドレス</strong>{{$data['email']}}

<strong>メッセージ</strong>{{$data['message']}}

@endcomponent
