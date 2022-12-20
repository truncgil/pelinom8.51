@extends('admin.master')
@section("title",__("Kullanıcılar"))
@section("desc",__("Sistemde yer alan kullanıcıları bu bölümden yönetebilirsiniz"))
@section('content')
<div class="content">
    <div class="block">
            <div class="block-header block-header-default">
                <h3 class="block-title">Users</h3>
            </div>
            <div class="block-content">
                <div class="table-responsive">
                    <table class="table table-striped table-vcenter">
                        <thead>
                            <tr>
                                <th class="text-center" style="width: 100px;"><i class="si si-user"></i></th>
                                <th>Name</th>
                                <th style="width: 30%;">Email</th>
                                <th style="width: 15%;">Level</th>
                                <th class="text-center" style="width: 100px;">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $users = db("users")->orderBy("id","DESC");
                            $users = $users->simplePaginate(20);

                            foreach($users AS $user)  { 
                             
                             ?>
                             <tr>
                                 <td class="text-center">
                                     <i class="fa fa-user fa-2x"></i>
                                 </td>
                                 <td class="font-w600">{{$user->name}} {{$user->surname}}</td>
                                 <td>{{$user->email}}</td>
                                 <td>
                                     <span class="badge badge-success">{{$user->level}}</span>
                                 </td>
                                 <td class="text-center">
                                     <div class="btn-group">
                                         <button type="button" class="btn btn-sm btn-secondary js-tooltip-enabled" data-toggle="tooltip" title="" data-original-title="Edit">
                                             <i class="fa fa-pen"></i>
                                         </button>
                                         <a href="?delete={{$user->id}}"" teyit="{{e2("Are you sure you want to delete?")}}" type="button" class="btn btn-sm btn-secondary js-tooltip-enabled" data-toggle="tooltip" title="Deleted?" data-original-title="Delete">
                                             <i class="fa fa-times"></i>
                                         </a>
                                     </div>
                                 </td>
                             </tr> 
                             <?php } ?>
                           
                        </tbody>
                    </table>
                </div>
            </div>

            

        </div>

    </div>
</div>
@endsection