@php $editing = isset($blogPostTag) @endphp

<div class="flex flex-wrap">
    <x-inputs.group class="w-full">
        <x-inputs.text
            name="blog_post_id"
            label="Blog Post Id"
            :value="old('blog_post_id', ($editing ? $blogPostTag->blog_post_id : ''))"
            maxlength="255"
            placeholder="Blog Post Id"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="w-full">
        <x-inputs.text
            name="blog_tag_id"
            label="Blog Tag Id"
            :value="old('blog_tag_id', ($editing ? $blogPostTag->blog_tag_id : ''))"
            maxlength="255"
            placeholder="Blog Tag Id"
            required
        ></x-inputs.text>
    </x-inputs.group>
</div>
