@extends('admin::layouts.main')

@include('admin::search.group-groups')

@section('content')
	<div class="row">
        <div class="col-md-12">
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">组列表</h3>
                    {{--
                    <div class="btn-group pull-right">
                        <a href="{{ route('admin::items.create') }}" class="btn btn-sm btn-success">
                            <i class="fa fa-save"></i>&nbsp;&nbsp;新增
                        </a>
                    </div>--}}

                    @include('admin::widgets.filter-btn-group', ['resetUrl' => route('admin::groups.index')])
                </div>

                <div class="box-body table-responsive no-padding">
                    <table class="table">
                        <tbody>
                        <tr>
                            <th>ID</th>
                            <th>组名</th>
                            <th>组头像</th>
                            <th>创建者</th>
                            <th>组描述</th>
                            <th>组员人数</th>
                            <th>创建时间</th>
                            <th>操作</th>
                        </tr> 
                        @foreach($groups as $group)
                            <tr>
                                <td>{{ $group->id }}</td>
                                <td>{{ $group->name }}</td>
                                <td>{{ $group->group_head }}</td>
                                <td>{{ $group->create_id }}</td>
                                <td>{{ $group->commit }}</td>
                                <td>{{ $group->commit }}</td>
                                <td>{{ $group->created_at }}</td>
                                <td>
                                    <a href="">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <a href="javascript:void(0);" data-id="{{ $group->id }}" class="grid-row-delete">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="box-footer">
                    {{ $groups->links('admin::widgets.pagination') }}
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    @include('admin::js.grid-row-delete', ['url' => route('admin::groups.index')])
@endsection