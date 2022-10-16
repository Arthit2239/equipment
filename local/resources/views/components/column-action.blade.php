@if (!empty($url_sub))
    <a alt="Sub" title="รายละเอียด" href="{{ $url_sub }}" class="btn btn-outline" target="_blank">
        <i class="fa fa-laptop font-black"></i>
    </a>
@endif

@if (!empty($url_gallery))
    <a alt="Gallery" title="แกลลอรี่" href="{{ $url_gallery }}" class="btn btn-outline" target="_blank">
        <i class="fa fa-picture-o font-green"></i>
    </a>
@endif

@if (!empty($url_edit))
    <a alt="Edit" title="แก้ไข" href="{{ $url_edit }}" class="btn btn-outline" target="_blank">
        <i class="fa fa-edit font-blue"></i>
    </a>
@endif

@if (!empty($url_copy))
    <a href="{{ $url_copy }}" onclick="ConfirmCopy('{{ $url_option }}');">
        <button type="button" class="btn btn-outline btn-sm" name="btn_copy" id="btn_copy" alt="คัดลอก" title="คัดลอก">
            <i class="fa fa-copy font-yellow"></i>
        </button>
    </a>
@endif

@if (!empty($url_delete))
    <a data-placement="left" alt="Delete" title="ลบ" data-singleton="true" data-popout="true"
        class="btn btn-outline" onclick="ConfirmDelete('{{ $url_delete }}')">
        <i class="fa fa-trash-o font-red"></i>
    </a>
@endif

@if (!empty($url_modal))
    <button type="button" class="btn btn-dark" name="btn_modal" id="btn_modal" onclick="getModal('{{ $url_modal }}');">
        {{ $url_text }}
    </button>
@endif
