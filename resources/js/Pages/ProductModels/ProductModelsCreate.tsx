import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout";
import { Head, useForm } from "@inertiajs/react";
import { PageProps } from "@/types";
import { BaseSyntheticEvent } from "react";
import PrimaryButton from "@/Components/PrimaryButton";
import TextField from "@/Components/Forms/TextField";
import Card from "@/Components/Card";
import PageContainer from "@/Components/PageContainer";
import { Routes } from "@/types/routes";
import TextAreaField from "@/Components/Forms/TextAreaField";

export interface ProductModelsCreateProps extends PageProps {}

export default function ProductModelsCreate({
    auth,
}: ProductModelsCreateProps) {
    const { post, reset, data, setData, errors, processing } = useForm({
        name: "",
        description: "",
    });

    const submit = (e: BaseSyntheticEvent) => {
        e.preventDefault();
        post(route("product.store"), { onSuccess: () => reset() });
    };

    return (
        <AuthenticatedLayout
            user={auth.user}
            header={{ name: "New Product", backButton: Routes.PRODUCT_MODELS }}
        >
            <Head title="New Product" />

            <PageContainer>
                <form onSubmit={submit}>
                    <Card
                        heading="Create new Product"
                        subheading="Products are the high level item, you can create your individual variants later."
                    >
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
                    </Card>
                    <PrimaryButton className="mt-4" disabled={processing}>
                        Add Product
                    </PrimaryButton>
                </form>
            </PageContainer>
        </AuthenticatedLayout>
    );
}
