@if ($model->is_editable == 'yes')
    <x-utils.edit-button :href="route('admin.auth.categories.edit', $model)" />
    <x-utils.delete-button :href="route('admin.auth.categories.destroy', $model)" />
@endif
