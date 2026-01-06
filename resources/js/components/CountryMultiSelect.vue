<script setup lang="ts">
import { Input } from '@/components/ui/input';
import { Label } from '@/components/ui/label';
import { ChevronDown } from 'lucide-vue-next';
import { computed, ref } from 'vue';

interface Country {
    id: number;
    name: string;
    code: string;
}

const props = defineProps<{
    modelValue: number[];
    countries: Country[];
    error?: string;
}>();

const emit = defineEmits<{
    (e: 'update:modelValue', value: number[]): void;
}>();

const searchQuery = ref('');
const isOpen = ref(false);

const filteredCountries = computed(() => {
    if (!searchQuery.value) return props.countries;
    const query = searchQuery.value.toLowerCase();
    return props.countries.filter((country) =>
        country.name.toLowerCase().includes(query),
    );
});

const isAllSelected = computed(() => {
    return (
        props.countries.length > 0 &&
        filteredCountries.value.every((country) =>
            props.modelValue.includes(country.id),
        )
    );
});

const selectedSummary = computed(() => {
    if (props.modelValue.length === 0) {
        return 'Select countries...';
    }

    // Get selected country objects
    const selectedCountries = props.countries.filter((c) =>
        props.modelValue.includes(c.id),
    );

    // Map to names
    const names = selectedCountries.map((c) => c.name);

    if (names.length <= 3) {
        return names.join(', ');
    }

    return `${names.slice(0, 3).join(', ')} +${names.length - 3} more`;
});

const toggleAll = (checked: boolean | 'indeterminate') => {
    // Treat 'indeterminate' as unchecked for the purpose of toggling -> select all
    const shouldSelectAll = checked === true;

    if (shouldSelectAll) {
        // Get all IDs from the current filter
        const filteredIds = filteredCountries.value.map((c) => Number(c.id));

        // Merge with existing selection, ensuring unique values
        const currentSelected = props.modelValue.map((id) => Number(id));
        const newSelected = [...new Set([...currentSelected, ...filteredIds])];

        emit('update:modelValue', newSelected);
    } else {
        // Deselect all currently filtered countries
        const filteredIds = filteredCountries.value.map((c) => Number(c.id));
        const newSelected = props.modelValue
            .map((id) => Number(id))
            .filter((id) => !filteredIds.includes(id));

        emit('update:modelValue', newSelected);
    }
};

const toggleCountry = (
    countryId: number,
    checked: boolean | 'indeterminate',
) => {
    const id = Number(countryId);
    const newSelected = props.modelValue.map((val) => Number(val));

    if (checked === true) {
        if (!newSelected.includes(id)) {
            newSelected.push(id);
        }
    } else {
        const index = newSelected.indexOf(id);
        if (index > -1) {
            newSelected.splice(index, 1);
        }
    }

    emit('update:modelValue', newSelected);
};
</script>

<template>
    <div class="space-y-2">
        <Label>Country Access</Label>

        <!-- Trigger -->
        <div
            @click="isOpen = !isOpen"
            class="flex cursor-pointer items-center justify-between rounded-md border border-input bg-background px-3 py-2 text-sm ring-offset-background hover:bg-accent hover:text-accent-foreground"
            role="button"
            :aria-expanded="isOpen"
        >
            <span :class="{ 'text-muted-foreground': modelValue.length === 0 }">
                {{ selectedSummary }}
            </span>
            <ChevronDown
                class="h-4 w-4 opacity-50 transition-transform duration-200"
                :class="{ 'rotate-180': isOpen }"
            />
        </div>

        <!-- Dropdown Content -->
        <div
            v-if="isOpen"
            class="mt-1 rounded-md border border-input p-3 shadow-sm"
        >
            <Input
                v-model="searchQuery"
                placeholder="Search Countries..."
                class="mb-3"
            />

            <div class="mb-2 flex items-center space-x-2">
                <input
                    id="select-all"
                    type="checkbox"
                    :checked="isAllSelected"
                    @change="
                        (e) => toggleAll((e.target as HTMLInputElement).checked)
                    "
                    class="size-4 cursor-pointer rounded border-border text-blue-600 focus:ring-blue-500"
                />
                <Label for="select-all" class="cursor-pointer font-normal"
                    >Select All</Label
                >
            </div>

            <div class="max-h-60 space-y-2 overflow-y-auto">
                <div
                    v-for="country in filteredCountries"
                    :key="country.id"
                    class="flex items-center space-x-2"
                >
                    <input
                        :id="`country-${country.id}`"
                        type="checkbox"
                        :checked="props.modelValue.includes(Number(country.id))"
                        @change="
                            (e) =>
                                toggleCountry(
                                    Number(country.id),
                                    (e.target as HTMLInputElement).checked,
                                )
                        "
                        class="size-4 cursor-pointer rounded border-border text-blue-600 focus:ring-blue-500"
                    />
                    <Label
                        :for="`country-${country.id}`"
                        class="cursor-pointer font-normal"
                    >
                        {{ country.name }}
                    </Label>
                </div>
                <div
                    v-if="filteredCountries.length === 0"
                    class="py-2 text-center text-sm text-muted-foreground"
                >
                    No countries found.
                </div>
            </div>
        </div>

        <p v-if="error" class="text-sm text-destructive">
            {{ error }}
        </p>
    </div>
</template>
