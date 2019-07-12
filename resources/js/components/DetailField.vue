<template>
    <panel-item :field="field">
        <p slot="value" class="text-90">
            <span
                class="inline-block rounded-full w-2 h-2 mr-1"
                :style="{ 'background-color': metaValues.color }"
            />
            <span>{{ metaValues.label }}</span>
        </p>
    </panel-item>
</template>

<script>
export default {
    props: ['resource', 'resourceName', 'resourceId', 'field'],
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
