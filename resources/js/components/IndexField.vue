<template>
    <div class="text-center">
        <span
            class="inline-block rounded-full w-2 h-2"
            :style="{ 'background-color': metaValues.color }"
        />
        <span v-if="this.field.showLabelOnIndex">{{ metaValues.label }}</span>
    </div>
</template>

<script>
export default {
    props: ['resourceName', 'field'],
    computed: {
        metaValues () {
            return this.field.value == true ? this.meta['true'] : this.meta['false']
        },
    },
    data() {
        return {
            meta: {
                'true': {
                    value: true,
                    label: 'Yes',
                    color: 'green',
                },
                'false': {
                    value: false,
                    label: 'No',
                    color: 'red',                    
                }
            }
        }
    },
    mounted() {
        if (this.field.trueMeta) {
            this.meta['true'] = this.field.trueMeta 
        }

        if (this.field.falseMeta) {
            this.meta['false'] = this.field.falseMeta 
        }
    }
}
</script>
