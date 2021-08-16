<!--  Category -->
<div x-data="{show:false}" class="w-32">
    <div @click="show = !show">
        {{ $trigger }}
    </div>
    {{ $slot }}
</div>
