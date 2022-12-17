<style>
    .add {
        height: 40px;
        background: #23468c;
        border: #23468c;
        color: white;
        font-family: Muli;
        width: 130px;
    }

    .add:hover {
        background: white;
        color: #23468c;
        border: #23468c 1px solid;
    }
</style>
<div style=" width: 900px; color:#23468c">
    <p style="font-size: 40px; text-align:center; margin-top:30px; font-family: muli;">Thêm Danh Mục Bài Viết</p>
    <table border="0" width="100%" style=" border-collapse: collapse; height: 140px;  border:none; background:#F0F0F0 ">
        <form method="POST" action="modu/quanlydanhmucbaiviet/xuly.php">
            <tr>
                <td style="padding-left:50px; font-size: 17px; font-weight:bold; ">Tên Danh Mục</td>
                <td><input style="border: 1px #23468c solid ; height: 40px; width:450px" type="text" name="tendanhmucbaiviet"></td>
            </tr>
            
            <tr style="text-align:center">
                <td colspan="2"><input class="add" type="submit" name="themdanhmucbaiviet" value="Thêm Danh Mục"></td>
            </tr>
        </form>
    </table>
</div>