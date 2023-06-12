<script setup>
const props = defineProps({
  data: Object,
});
</script>

<template>
  <div
    class="
      border-t border-gray-200
      px-4
      mt-5
      flex
      items-center
      justify-center
      sm:px-0
    "
  >
    <Component
      :is="link.url ? 'Link' : 'span'"
      v-for="link in data.links"
      :key="link.id"
      :href="link.url"
      v-html="link.label"
      :class="{ 'text-gray-300': ! link.url, 'text-black border-black font-bold text-base' : link.active }"
      class="
        border-transparent
        text-gray-500
        border-t-2
        hover:text-gray-900 hover:border-gray-300
        pt-4
        px-4
        inline-flex
        items-center
        text-sm
        font-medium
      "
    />
  </div>
</template>
