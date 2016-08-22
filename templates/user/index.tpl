{extends file='../base.tpl'}

{block name=body}
<div class="jumbotron">
    <h1>用户信息</h1>
    <p class="lead">展示所有的用户信息列表</p>
    <div class="body-content">
        <table class="table">
            <thead>
                <tr><th>id</th><th>name</th><th>password</th><th>email</th><th>操作</th></tr>
            </thead>
            <tbody>
                {foreach $users as $key => $user}
                <tr>
                    <td>{$user.id}</td>
                    <td>{$user.name}</td>
                    <td>{$user.password}</td>
                    <td>{$user.email}</td>
                    <td>
                        <a href="/user/detail?id={$user.id}">详情</a>
                        <a href="/user/delete?id={$user.id}">删除</a>
                        <a href="/user/edit?id={$user.id}">编辑</a>
                    </td>
                </tr>
                {/foreach}
            </tbody>
        </table>
        <a class="btn btn-default" href="/user/show" role="button">Add User</a>
    </div>
</div>
{/block}
