<script setup lang="ts">
import { ref, computed } from 'vue';
import AppLayout from '@/layouts/AppLayout.vue';
import { dashboard } from '@/routes';
import { index as ecommerceIndex, products } from '@/routes/ecommerce';
import { type BreadcrumbItem } from '@/types';
import { Head, Link } from '@inertiajs/vue3';
import { Button } from '@/components/ui/button';
import { Input } from '@/components/ui/input';
import { Label } from '@/components/ui/label';
import { ArrowLeft, Save, Plus, X } from 'lucide-vue-next';

interface Props {
    id?: string;
    product?: {
        id: string;
        name: string;
        sku: string;
        description: string;
        price: number;
        stock: number;
        category: string;
        specifications: Record<string, string>;
        features: string[];
    };
    categories: string[];
}

const props = withDefaults(defineProps<Props>(), {
    id: undefined,
    product: undefined,
    categories: () => [],
});

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Dashboard',
        href: dashboard().url,
    },
    {
        title: 'E-Commerce',
        href: ecommerceIndex().url,
    },
    {
        title: 'Product Catalog',
        href: products().url,
    },
    {
        title: props.id ? 'Edit Product' : 'Create Product',
        href: '#',
    },
];

const isEditMode = computed(() => !!props.id);

const formData = ref({
    name: props.product?.name || '',
    sku: props.product?.sku || '',
    description: props.product?.description || '',
    price: props.product?.price || 0,
    stock: props.product?.stock || 0,
    category: props.product?.category || '',
    specifications: props.product?.specifications ? { ...props.product.specifications } : {},
    features: props.product?.features ? [...props.product.features] : [''],
});

const specificationKeys = ref(Object.keys(formData.value.specifications));
const specificationValues = ref(Object.values(formData.value.specifications));

const addSpecification = () => {
    specificationKeys.value.push('');
    specificationValues.value.push('');
};

const removeSpecification = (index: number) => {
    specificationKeys.value.splice(index, 1);
    specificationValues.value.splice(index, 1);
};

const addFeature = () => {
    formData.value.features.push('');
};

const removeFeature = (index: number) => {
    if (formData.value.features.length > 1) {
        formData.value.features.splice(index, 1);
    }
};

const saveProduct = () => {
    // Build specifications object
    const specifications: Record<string, string> = {};
    specificationKeys.value.forEach((key, index) => {
        if (key && specificationValues.value[index]) {
            specifications[key] = specificationValues.value[index];
        }
    });

    // Filter empty features
    const features = formData.value.features.filter(f => f.trim() !== '');

    const productData = {
        ...formData.value,
        specifications,
        features,
    };

    console.log('Saving product:', productData);
    // TODO: Implement actual save logic
};
</script>

<template>
    <Head :title="isEditMode ? 'Edit Product' : 'Create Product'" />

    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="flex h-full flex-1 flex-col gap-2 overflow-hidden rounded-xl p-2">
            <!-- Header Section -->
            <div class="flex flex-col gap-2">
                <div class="flex items-center justify-between">
                    <div class="flex items-center gap-3">
                        <Link :href="products().url">
                            <Button variant="ghost" size="sm" class="h-8">
                                <ArrowLeft class="size-4 mr-2" />
                                Back
                            </Button>
                        </Link>
                        <h1 class="text-base font-semibold text-foreground">
                            {{ isEditMode ? 'Edit Product' : 'Create Product' }}
                        </h1>
                    </div>
                    <Button class="bg-blue-600 hover:bg-blue-700 text-white h-8" @click="saveProduct">
                        <Save class="size-4 mr-2" />
                        Save Product
                    </Button>
                </div>

                <!-- Form -->
                <div class="grid grid-cols-1 gap-6 lg:grid-cols-2">
                    <!-- Left Column -->
                    <div class="flex flex-col gap-4">
                        <!-- Basic Information -->
                        <div class="rounded-lg border border-border bg-card p-4">
                            <h2 class="text-base font-semibold text-foreground mb-4">Basic Information</h2>
                            <div class="space-y-4">
                                <div>
                                    <Label for="name">Product Name</Label>
                                    <Input
                                        id="name"
                                        v-model="formData.name"
                                        placeholder="Enter product name"
                                        class="mt-1"
                                    />
                                </div>
                                <div>
                                    <Label for="sku">SKU</Label>
                                    <Input
                                        id="sku"
                                        v-model="formData.sku"
                                        placeholder="Enter SKU"
                                        class="mt-1 font-mono"
                                    />
                                </div>
                                <div>
                                    <Label for="category">Category</Label>
                                    <select
                                        id="category"
                                        v-model="formData.category"
                                        class="mt-1 flex h-10 w-full rounded-md border border-input bg-background px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-ring"
                                    >
                                        <option value="">Select category</option>
                                        <option v-for="category in categories" :key="category" :value="category">
                                            {{ category }}
                                        </option>
                                    </select>
                                </div>
                                <div>
                                    <Label for="description">Description</Label>
                                    <textarea
                                        id="description"
                                        v-model="formData.description"
                                        placeholder="Enter product description"
                                        rows="4"
                                        class="mt-1 flex w-full rounded-md border border-input bg-background px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-ring"
                                    ></textarea>
                                </div>
                            </div>
                        </div>

                        <!-- Pricing & Stock -->
                        <div class="rounded-lg border border-border bg-card p-4">
                            <h2 class="text-base font-semibold text-foreground mb-4">Pricing & Stock</h2>
                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <Label for="price">Price ($)</Label>
                                    <Input
                                        id="price"
                                        v-model.number="formData.price"
                                        type="number"
                                        step="0.01"
                                        placeholder="0.00"
                                        class="mt-1"
                                    />
                                </div>
                                <div>
                                    <Label for="stock">Stock Quantity</Label>
                                    <Input
                                        id="stock"
                                        v-model.number="formData.stock"
                                        type="number"
                                        placeholder="0"
                                        class="mt-1"
                                    />
                                </div>
                            </div>
                        </div>

                        <!-- Specifications -->
                        <div class="rounded-lg border border-border bg-card p-4">
                            <div class="flex items-center justify-between mb-4">
                                <h2 class="text-base font-semibold text-foreground">Specifications</h2>
                                <Button variant="outline" size="sm" @click="addSpecification">
                                    <Plus class="size-4 mr-2" />
                                    Add
                                </Button>
                            </div>
                            <div class="space-y-3">
                                <div
                                    v-for="(key, index) in specificationKeys"
                                    :key="index"
                                    class="flex items-center gap-2"
                                >
                                    <Input
                                        v-model="specificationKeys[index]"
                                        placeholder="Specification name"
                                        class="flex-1"
                                    />
                                    <Input
                                        v-model="specificationValues[index]"
                                        placeholder="Value"
                                        class="flex-1"
                                    />
                                    <Button
                                        variant="ghost"
                                        size="sm"
                                        @click="removeSpecification(index)"
                                    >
                                        <X class="size-4" />
                                    </Button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Right Column -->
                    <div class="flex flex-col gap-4">
                        <!-- Features -->
                        <div class="rounded-lg border border-border bg-card p-4">
                            <div class="flex items-center justify-between mb-4">
                                <h2 class="text-base font-semibold text-foreground">Features</h2>
                                <Button variant="outline" size="sm" @click="addFeature">
                                    <Plus class="size-4 mr-2" />
                                    Add
                                </Button>
                            </div>
                            <div class="space-y-3">
                                <div
                                    v-for="(feature, index) in formData.features"
                                    :key="index"
                                    class="flex items-center gap-2"
                                >
                                    <Input
                                        v-model="formData.features[index]"
                                        placeholder="Enter feature"
                                        class="flex-1"
                                    />
                                    <Button
                                        v-if="formData.features.length > 1"
                                        variant="ghost"
                                        size="sm"
                                        @click="removeFeature(index)"
                                    >
                                        <X class="size-4" />
                                    </Button>
                                </div>
                            </div>
                        </div>

                        <!-- Product Image -->
                        <div class="rounded-lg border border-border bg-card p-4">
                            <h2 class="text-base font-semibold text-foreground mb-4">Product Image</h2>
                            <div class="flex items-center justify-center h-64 bg-muted rounded-lg border-2 border-dashed border-border">
                                <div class="text-center">
                                    <p class="text-sm text-muted-foreground mb-2">Upload product image</p>
                                    <Button variant="outline" size="sm">
                                        Choose File
                                    </Button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>

