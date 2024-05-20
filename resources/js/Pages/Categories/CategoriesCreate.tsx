import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout";
import { Head, useForm } from "@inertiajs/react";
import { PageProps } from "@/types";
import { BaseSyntheticEvent } from "react";
import PrimaryButton from "@/Components/PrimaryButton";
import TextField from "@/Components/Forms/TextField";
import Card from "@/Components/Card";
import PageContainer from "@/Components/PageContainer";
import { Routes } from "@/types/routes";

export interface CategoriesCreateProps extends PageProps {}

export default function CategoriesCreate({ auth }: CategoriesCreateProps) {
    const { post, reset, data, setData, errors, processing } = useForm({
        name: "",
        description: "",
    });

    const submit = (e: BaseSyntheticEvent) => {
        e.preventDefault();
        post(route("categories.store"), { onSuccess: () => reset() });
    };

    return (
        <AuthenticatedLayout
            user={auth.user}
            header={{ name: "New Category", backButton: Routes.CATEGORIES }}
        >
            <Head title="New Category" />

            <PageContainer>
                <Card
                    heading="Create new Category"
                    subheading="Categories allow you to group your products together."
                >
                    <form onSubmit={submit}>
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

                        <PrimaryButton className="mt-4" disabled={processing}>
                            Add Category
                        </PrimaryButton>
                    </form>
                </Card>
            </PageContainer>
        </AuthenticatedLayout>
    );
}
