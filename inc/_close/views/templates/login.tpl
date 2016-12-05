{extends file="standard_wrap.tpl"}
{block name="content"}
    <div class="">
        <form enctype="application/x-www-form-urlencoded" method="post">
            <div class="form-group">
                <label for="inputPassword">Access only with Password</label>
                <input type="password" name="actionValue" class="form-control" id="inputPassword" placeholder="Password">
            </div>
            <button type="submit" class="btn btn-default">Submit</button>

            <input type="hidden" name="action" value="tryLogin">

        </form>
    </div>
{/block}