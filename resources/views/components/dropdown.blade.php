<!--  Category -->
<div x-data="{show:false}" class="w-34 relative">
    <div @click="show = !show">
        {{ $trigger }}
    </div>
    {{ $slot }}
</div>
