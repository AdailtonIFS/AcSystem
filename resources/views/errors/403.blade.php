@extends('errors::minimal')

@section('title', __('Não autorizado'))
@section('code', '403')
@section('message', __('Você não tem autorização para realizar essa ação' ?: 'Forbidden'))
