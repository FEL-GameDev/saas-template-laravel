import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout";
import { Head, useForm } from "@inertiajs/react";
import { PageProps } from "@/types";
import { BaseSyntheticEvent } from "react";
import PrimaryButton from "@/Components/PrimaryButton";
import PageContainer from "@/Components/PageContainer";
import { Routes } from "@/types/routes";
import { SubCategoryCreate } from "@/types/categories/category";
import { CategoryEditCard } from "./components/CategoryEditCard";
import { SubCategoriesEditCard } from "./components/SubCategoriesEditCard";

export interface CategoriesCreateProps extends PageProps {}

export default function CategoriesCreate({ auth }: CategoriesCreateProps) {
    const { post, data, setData, errors, processing } = useForm({
        name: "",
        description: "",
        subCategories: [{ name: "", description: "" }] as SubCategoryCreate[],
    });

    const submit = (e: BaseSyntheticEvent) => {
        e.preventDefault();
        post(route("categories.store"), {
            onSuccess: () => route(Routes.CATEGORIES),
        });
    };

    debugger;
    return (
        <AuthenticatedLayout
            user={auth.user}
            header={{ name: "New Category", backButton: Routes.CATEGORIES }}
        >
            <Head title="New Category" />

            <PageContainer>
                <form onSubmit={submit} className="space-y-6">
                    <CategoryEditCard
                        heading="Create new Category"
                        nameValue={data.name}
                        nameError={errors.name}
                        onChangeName={(name) => setData("name", name)}
                        descriptionValue={data.description}
                        descriptionError={errors.description}
                        onChangeDescription={(description) =>
                            setData("description", description)
                        }
                    />

                    <SubCategoriesEditCard
                        errors={errors}
                        subCategories={data.subCategories}
                        onChange={(subCategories: SubCategoryCreate[]) =>
                            setData("subCategories", subCategories)
                        }
                    />

                    <PrimaryButton className="mt-4" disabled={processing}>
                        Add Category
                    </PrimaryButton>
                </form>
            </PageContainer>
        </AuthenticatedLayout>
    );
}
