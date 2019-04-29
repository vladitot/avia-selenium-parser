@servers(['localhost' => '127.0.0.1'])

@include('docker/variables.php')

@task('tasks', ['on'=>'localhost'])
    envoy tasks
@endtask

@task('laradock', ['on'=>'localhost'])
    rm -rf laradock || true
    git clone https://github.com/Laradock/laradock.git
    cd laradock && git reset --hard 329462a637af77f466c2fd041c3d9a80d4ddd30c && cd ../
    cp laradock/env-example laradock/.env
    rm -rf laradock/.github
    rm -rf laradock/.git
@endtask


@task('build-list', ['on'=>'localhost'])

@if (!$debug)
    @php
        $redir = '> /dev/null';
    @endphp
@else
    @php
        $redir = '';
    @endphp
@endif

{{ $dockerCompose }} build workspace {{ $redir }} && \
{{ $dockerCompose }} build workspace-extended {{ $redir }} && \
{{ $dockerCompose }} build php-fpm {{ $redir }} && \
{{--{{ $dockerCompose }} build php-fpm-extended {{ $redir }} && \--}}
{{--{{ $dockerCompose }} build laravel-horizon-extended {{ $redir }} && \--}}
{{--{{ $dockerCompose }} build redis {{ $redir }} && \--}}
{{--{{ $dockerCompose }} build redis-extended {{ $redir }} && \--}}
{{--{{ $dockerCompose }} build memcached {{ $redir }} && \--}}
{{--{{ $dockerCompose }} build memcached-extended {{ $redir }} && \--}}
{{ $dockerCompose }} build nginx {{ $redir }} && \
{{--{{ $dockerCompose }} build nginx-extended {{ $redir }}--}}
@endtask


@task('up', ['on' => 'localhost'])
    @run('build-list')
    {{ $dockerCompose }} up -d workspace-extended php-fpm nginx
@endtask


@task('bash', ['on'=>'localhost'])
    {{ $dockerCompose }} exec -u laradock workspace-extended bash
@endtask