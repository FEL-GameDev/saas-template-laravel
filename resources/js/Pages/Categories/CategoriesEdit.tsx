import Card from "@/Components/Card";
import TextField from "@/Components/Forms/TextField";
import PageContainer from "@/Components/PageContainer";
import PrimaryButton from "@/Components/PrimaryButton";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout";
import { PageProps } from "@/types";
import { Category } from "@/types/categories/category";
import { Head, router, useForm } from "@inertiajs/react";
import { BaseSyntheticEvent } from "react";

interface CategoriesEditProps extends PageProps {
    category: Category;
}

export default function CategoriesEdit({
    auth,
    category,
}: CategoriesEditProps) {
    const { put, reset, data, setData, errors, processing } = useForm({
        name: category.name,
        description: category.description ?? "",
        category_id: category.id,
    });

    const submit = (e: BaseSyntheticEvent) => {
        e.preventDefault();
        put(route("categories.update", category.id), {
            preserveScroll: true,
            onSuccess: () => router.visit(route("categories.index")),
        });
    };

    return (
        <AuthenticatedLayout
            user={auth.user}
            header={{ name: "Edit Category" }}
        >
            <Head title="Edit Category" />

            <PageContainer>
                <Card heading="Edit Category">
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

                            <TextField
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
                            name="category_id"
                            value={category.id}
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
