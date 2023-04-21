import ClassicEditorBase from '@ckeditor/ckeditor5-editor-classic/src/classiceditor';
import EssentialsPlugin from '@ckeditor/ckeditor5-essentials/src/essentials';
import UploadAdapterPlugin from '@ckeditor/ckeditor5-adapter-ckfinder/src/uploadadapter';
import AutoformatPlugin from '@ckeditor/ckeditor5-autoformat/src/autoformat';
import BoldPlugin from '@ckeditor/ckeditor5-basic-styles/src/bold';
import ItalicPlugin from '@ckeditor/ckeditor5-basic-styles/src/italic';
import BlockQuotePlugin from '@ckeditor/ckeditor5-block-quote/src/blockquote';
import EasyImagePlugin from '@ckeditor/ckeditor5-easy-image/src/easyimage';
import HeadingPlugin from '@ckeditor/ckeditor5-heading/src/heading';
import ImagePlugin from '@ckeditor/ckeditor5-image/src/image';
import ImageCaptionPlugin from '@ckeditor/ckeditor5-image/src/imagecaption';
import ImageStylePlugin from '@ckeditor/ckeditor5-image/src/imagestyle';
import ImageToolbarPlugin from '@ckeditor/ckeditor5-image/src/imagetoolbar';
import ImageUploadPlugin from '@ckeditor/ckeditor5-image/src/imageupload';
import ImageResizePlugin from '@ckeditor/ckeditor5-image/src/imageresize';
import ImageAutoPlugin from '@ckeditor/ckeditor5-image/src/autoimage';
import LinkPlugin from '@ckeditor/ckeditor5-link/src/link';
import ListPlugin from '@ckeditor/ckeditor5-list/src/list';
import ParagraphPlugin from '@ckeditor/ckeditor5-paragraph/src/paragraph';
import CloudServicesPlugin from '@ckeditor/ckeditor5-cloud-services/src/cloudservices';
import CloudServicesUploadAdapterPlugin from '@ckeditor/ckeditor5-easy-image/src/cloudservicesuploadadapter';
import Base64UploadAdapter from '@ckeditor/ckeditor5-upload/src/adapters/base64uploadadapter';

ClassicEditorBase.defaultConfig = {
    toolbar: {
        items: [
            'heading',
            '|',
            'bold',
            'italic',
            'link',
            '|',
            'bulletedList',
            'numberedList',
            'uploadImage',
            '|',
            'undo',
            'redo',
        ]
    },
    heading: {
        options: [
            { model: 'paragraph', title: 'Đoạn văn', class: 'ck-heading_paragraph' },
            { model: 'heading1', view: 'h1', title: 'Tiêu đề 1', class: 'ck-heading_heading1' },
            { model: 'heading2', view: 'h2', title: 'Tiêu đề 2', class: 'ck-heading_heading2' },
            { model: 'heading3', view: 'h3', title: 'Tiêu đề 3', class: 'ck-heading_heading3' },
        ]
    },
    image: {
        toolbar: [
            'imageStyle:inline',
            '|',
            'toggleImageCaption',
            'imageTextAlternative',
        ]
    },
    language: 'vi'
}

const imageResizeOptions = [
    {
        name: 'ImageResize:25',
        value: '25',
        icon: 'small'
    },
    {
        name: 'ImageResize:50',
        value: '50',
        icon: 'medium'
    },
    {
        name: 'ImageResize:75',
        value: '75',
        icon: 'large'
    },
    {
        name: 'ImageResize:original',
        value: null,
        icon: 'original'
    }
];

const imageResizeToolbar = [
    'ImageResize:25',
    'ImageResize:50',
    'ImageResize:75',
    'ImageResize:original'
];

const imageStyle = {
    options: [ 'inline', 'alignLeft', 'alignRight' ]
};

const imageOptions = {
    resizeUnit: "%",
    resizeOptions: imageResizeOptions,
    toolbar: imageResizeToolbar,
    styles: imageStyle
};
const lstPlugin = [
    EssentialsPlugin,
    UploadAdapterPlugin,
    AutoformatPlugin,
    BoldPlugin,
    ItalicPlugin,
    BlockQuotePlugin,
    EasyImagePlugin,
    HeadingPlugin,
    ImagePlugin,
    ImageCaptionPlugin,
    ImageStylePlugin,
    ImageToolbarPlugin,
    ImageUploadPlugin,
    ImageResizePlugin,
    ImageAutoPlugin,
    LinkPlugin,
    ListPlugin,
    ParagraphPlugin,
    CloudServicesPlugin,
    CloudServicesUploadAdapterPlugin,
    Base64UploadAdapter
];
class UploadAdapter {
	constructor(loader) {
		this.loader = loader;
	}
	upload() {
		return new Promise((resolve, reject) => {
			const reader = this.reader = new window.FileReader();

			reader.addEventListener('load', () => {
				resolve({default: reader.result});
			});

			reader.addEventListener('error', err => {
				reject(err);
			});

			reader.addEventListener('abort', () => {
				reject();
			});

			this.loader.file.then( file => {
                const size = file.size;
                if ( size >= 204800 ) {
                    toastr.error('Vui lòng tải những file có dung lượng nhỏ hơn 200KB.');
                    reject();
                } else {
                    reader.readAsDataURL(file);
                }
			});
		} );
	}

	abort() {
		this.reader.abort();
	}
}

ClassicEditorBase.create(document.querySelector('.ck-editor'),{
    plugins: lstPlugin,
    image: imageOptions
}).then(editor => {
    editor.plugins.get('FileRepository').createUploadAdapter = loader => new UploadAdapter(loader);
})
.catch(error => {
    console.error("CKeditor build error: ", error);
});
