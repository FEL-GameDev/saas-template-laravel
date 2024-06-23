import Card from "@/Components/Card";
import TextAreaField from "@/Components/Forms/TextAreaField";
import {TextField} from "@/Components/Forms/TextField";
import PageContainer from "@/Components/PageContainer";
import PrimaryButton from "@/Components/PrimaryButton";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout";
import {PageProps} from "@/types";
import {Product} from "@/types/products/product";
import {Routes} from "@/types/routes";
import {Head, router, useForm} from "@inertiajs/react";
import {BaseSyntheticEvent} from "react";

interface ProductModelsEditProps extends PageProps {
    product: Product;
}

export default function ProductModelsEdit({
    auth,
    product,
}: ProductModelsEditProps) {
    const { patch, data, setData, errors, processing } = useForm({
        name: product.name,
        description: product.description ?? "",
        product_id: product.id,
    });

    const submit = (e: BaseSyntheticEvent) => {
        e.preventDefault();
        patch(route("product.update", product.id), {
            preserveScroll: true,
            onSuccess: () => router.visit(route("products.index")),
        });
    };

    return (
        <AuthenticatedLayout
            user={auth.user}
            header={{
                name: "Edit Product",
                backButton: Routes.PRODUCT_MODELS,
            }}
        >
            <Head title="Edit Product" />

            <PageContainer>
                <Card heading="Edit Product">
                    <form onSubmit={submit} method="put">
                        <div className="mt-6 space-y-6 flex flex-col justify-center w-4/12">
                            <TextField
                                fullWidth
                                name="name"
                                value={data.name}
                                errors={errors.name}
                                label="Name"
                                onChange={(e: any) =>
                                    setData("name", e.target.value)
                                }
                            />

                            <TextAreaField
                                fullWidth
                                name="description"
                                value={data.description}
                                errors={errors.description}
                                label="Description"
                                onChange={(e: any) =>
                                    setData("description", e.target.value)
                                }
                            />
                        </div>

                        <input
                            type="hidden"
                            name="product_id"
                            value={product.id}
                        />

                        <PrimaryButton className="mt-4" disabled={processing}>
                            Update
                        </PrimaryButton>
                    </form>
                </Card>
            </PageContainer>
        </AuthenticatedLayout>
    );
}
